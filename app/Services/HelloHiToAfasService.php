<?php namespace App\Services;

use App\Enums\MappingType;
use App\Models\API\Organisation;
use App\Models\API\Person;

use App\Repositories\AfasOrganisationRepository;
use App\Repositories\AfasPersonRepository;
use App\Repositories\HHCustomerRepository;
use App\Repositories\HHPersonRepository;
use App\Repositories\MappingRepository;

class HelloHiToAfasService
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
        MappingRepository $mappingRepository
    ) {
        $this->afasOrganisationRepository = $afasOrganisationRepository;
        $this->afasPersonRepository = $afasPersonRepository;
        $this->HHCustomerRepository = $HHCustomerRepository;
        $this->HHPersonRepository = $HHPersonRepository;
        $this->mappingRepository = $mappingRepository;
    }
}