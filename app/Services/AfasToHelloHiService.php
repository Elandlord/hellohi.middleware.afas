<?php namespace App\Services;

use App\Repositories\AfasOrganisationRepository;
use App\Repositories\AfasPersonRepository;
use App\Repositories\HHCustomerRepository;
use App\Repositories\HHPersonRepository;
use App\Repositories\MappingRepository;

use HelloHi\ApiClient\Client;

use App\Models\Mapping;
use App\Models\API\Organisation;
use App\Models\API\Person;
use App\Enums\MappingType;

use App\Models\Tenant;

use Carbon\Carbon;

class AfasToHelloHiService
{
    /**
     * @var AfasOrganisationRepository
     */
    private $afasOrganisationRepository;

    /**
     * @var AfasPersonRepository
     */
    private $afasPersonRepository;

    /**
     * @var HHCustomerRepository
     */
    private $HHCustomerRepository;

    /**
     * @var HHPersonRepository
     */
    private $HHPersonRepository;

    /**
     * @var MappingRepository
     */
    private $mappingRepository;

    /**
     * AfasToHelloHiService constructor.
     * @param AfasOrganisationRepository $afasOrganisationRepository
     * @param AfasPersonRepository $afasPersonRepository
     * @param HHCustomerRepository $HHCustomerRepository
     * @param HHPersonRepository $HHPersonRepository
     */
    public function __construct(
        AfasOrganisationRepository $afasOrganisationRepository,
        AfasPersonRepository $afasPersonRepository,
        HHCustomerRepository $HHCustomerRepository,
        HHPersonRepository $HHPersonRepository,
        mappingRepository $mappingRepository
    ) {
        $this->afasOrganisationRepository = $afasOrganisationRepository;
        $this->afasPersonRepository = $afasPersonRepository;
        $this->HHCustomerRepository = $HHCustomerRepository;
        $this->HHPersonRepository = $HHPersonRepository;
        $this->mappingRepository = $mappingRepository;
    }

    public function syncAfasToHelloHi()
    {
        foreach(Tenant::all() as $tenant){
            // Switch per tenant!
            // Switch connection
            // Gives error: User has no access to this tenant.
            // How to get correct user credentials?
            $client = Client::getInstance();
            $client->setTenantId($tenant->remote_id);
            
            if($tenant->initial_sync == 0){
                $this->syncOrganisations($tenant);
                $this->syncPersons($tenant);
                $tenant->initial_sync = 1;
                $tenant->latest_sync = Carbon::now();
                $tenant->save();
            }
        }
    }

    public function syncOrganisations(Tenant $tenant)
    {
        foreach($this->afasOrganisationRepository->all() as $customer){
            // $organisation = new Organisation;
            
            // try to find local ID, else insert into mapping
            if (($mapping = $this->mappingRepository->findByRemoteId(MappingType::ORGANISATION, $customer['Organisatie_persoon'], $tenant->id))) {
                $helloHiCustomer = $this->HHCustomerRepository->find($mapping->local_id);
            }else {
                $customerData = $this->createHHCustomerFromAfasOrganisation($customer);
                $helloHiCustomer = $this->HHCustomerRepository->create($customerData);

                $mapping = new Mapping;
                $mapping->type = MappingType::ORGANISATION;
                $mapping->local_id = $helloHiCustomer->id;
                $mapping->remote_id = $customer['Organisatie_persoon'];
                $mapping->remote_client_number = 1;
                $mapping->tenant_id = $tenant->id;
                $mapping->save();
            }
        }

        return response()->json("Synced succesfully!", 200);
    }

    public function syncPersons(Tenant $tenant)
    {   
        foreach($this->afasPersonRepository->all() as $person){
            if (($mapping = $this->mappingRepository->findByRemoteId(MappingType::PERSON, $person['Organisatie_persoon'], $tenant->id))) {
                $helloHiPerson = $this->HHPersonRepository->find($mapping->local_id);
            }else {
                $personData = $this->createHHPersonFromAfasPerson($person);
                $helloHiPerson = $this->HHPersonRepository->create($personData);

                $mapping = new Mapping;
                $mapping->type = MappingType::PERSON;
                $mapping->local_id = $helloHiPerson->id;
                $mapping->remote_id = $person['Organisatie_persoon'];
                $mapping->remote_client_number = 1;
                $mapping->tenant_id = $tenant->id;
                $mapping->save();
            }
        }

        return response()->json("Synced succesfully!", 200);
    }

    public function createHHPersonFromAfasPerson($data)
    {        
        // Soort_contact is not corresponding to HelloHi ENUM
        if($data['Geslacht_code'] == 'V'){
            $data['Geslacht_code'] = 'f';
        }

        return [
            'salutation' => $data['Titel_voor'],
            'initials' => $data['Voorletters'],
            'first_name' => $data['Voornaam'],
            'last_name' => $data['Achternaam'],
            'gender' => strtolower($data['Geslacht_code']),
        ];
    }

    public function createHHCustomerFromAfasOrganisation($data)
    {
        // Soort_contact is not corresponding to HelloHi ENUM
        if($data['Soort_contact'] == 'Organisatie'){
            $data['Soort_contact'] = 'business';
        }

        if($data['Soort_contact']  == 'Persoon'){
            $data['Soort_contact'] = 'person';
        }

        return [
            // 'id' => $data['Organisatie_persoon'],
            'name' => $data['Naam'],
            'type' => $data['Soort_contact'],
            'address' => implode(' ', [
                    $data['Straat'],
                    $data['Huisnummer'],
                    $data['Huisnummer_toev']
                ]),
            'postal_code' => $data['Postcode'],
            'city' => $data['Woonplaats']
        ];
    }
}