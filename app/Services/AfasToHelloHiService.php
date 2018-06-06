<?php namespace App\Services;

use App\Repositories\AfasOrganisationRepository;
use App\Repositories\AfasPersonRepository;
use App\Repositories\HHCustomerRepository;
use App\Repositories\HHPersonRepository;
use App\Repositories\MappingRepository;

use HelloHi\ApiClient\Client;

use App\Models\Mapping;
use App\Models\API\Organisation;
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
            $client = Client::getInstance();
            $client->setTenantId($tenant->id);
            

            if($tenant->initial_sync == 0){
                $this->syncOrganisations($tenant);
                $this->syncPersons($tenant);
                $tenant->initial_sync = 1;
                $tenant->save();
            }
        }
    }

    public function syncOrganisations(Tenant $tenant)
    {
        // Switch per tenant!
        // Switch connection
        foreach($this->afasOrganisationRepository->all() as $customer){
            // $organisation = new Organisation;
            
            // try to find local ID, else insert into mapping
            if (($mapping = $this->mappingRepository->findByRemoteId(MappingType::ORGANISATION, $customer['Organisatie_persoon'], $tenant->id))) {
                $helloHiCustomer = $this->HHCustomerRepository->find($mapping->local_id);
            }else {
                $organisation = new Organisation;
                $customerData = $this->createHHCustomerFromAfasOrganisation($customer);
                $helloHiCustomer = $this->HHCustomerRepository->create($customerData);

                // DEBUG: $this->HHCustomerRepository->create($customerData); returns null...?

                $mapping = new Mapping;
                $mapping->type = MappingType::ORGANISATION;
                // Local ID needs to be filled with $helloHiCustomer->id when functional!!
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
        // Switch per tenant!
        // switch connection
        foreach($this->afasPersonRepository->all() as $person){
            // $organisation = new Organisation;
            // $organisation->setValuesFromArray($this->createHHCustomerFromAfasOrganisation($customer));
            // try to find local ID, else insert into mapping
            if (($mapping = $this->mappingRepository->findByRemoteId(MappingType::PERSON, $person['Organisatie_persoon'], $tenant->id))) {
                $helloHiPerson = $this->HHPersonRepository->find($mapping->local_id);
            }else {
                $mapping = new Mapping;
                $mapping->type = MappingType::PERSON;
                $mapping->local_id = 1;
                $mapping->remote_id = $person['Organisatie_persoon'];
                $mapping->remote_client_number = 1;
                $mapping->tenant_id = $tenant->id;
                $mapping->save();
            }
        }

        return response()->json("Synced succesfully!", 200);
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