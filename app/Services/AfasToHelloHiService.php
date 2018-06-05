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

    public function syncOrganisations()
    {
        // Switch per tenant!

        foreach($this->afasOrganisationRepository->all() as $customer){
            // $organisation = new Organisation;
            // $organisation->setValuesFromArray($this->createHHCustomerFromAfasOrganisation($customer));

            // dd($organisation);

            // try to find local ID, else insert into mapping
            if (($mapping = $this->mappingRepository->findByRemoteId(MappingType::ORGANISATION, $customer['Organisatie_persoon']))) {
                $helloHiCustomer = $this->HHCustomerRepository->find($mapping->local_id);
            }else {
                $mapping = new Mapping;
                $mapping->type = MappingType::ORGANISATION;
                $mapping->local_id = 1;
                $mapping->remote_id = $customer['Organisatie_persoon'];
                $mapping->remote_client_number = 1;
                $mapping->remote_client_number = Carbon::now();
                $mapping->remote_client_number = Carbon::now();
                $mapping->save();
            }
        }

        return response()->json("Synced succesfully!", 200);
    }

    public function syncPersons()
    {

    }

    public function createHHCustomerFromAfasOrganisation($data)
    {
        return [
            'id' => $data['Organisatie_persoon'],
            'name' => $data['Naam'],
            'address' => implode(' ', [
                    $data['Straat'],
                    $data['Huisnummer'],
                    $data['Huisnummer_toev']
                ]),
            'type' => $data['Soort_contact'],
            'postal_code' => $data['Postcode'],
            'city' => $data['Woonplaats']
        ];
    }
}