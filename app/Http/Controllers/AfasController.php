<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\AfasClient;

// Repositories
use App\Repositories\AfasOrganisationRepository;
use App\Repositories\AfasPersonRepository;

use App\Services\AfasToHelloHiService;

class AfasController extends Controller
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
     * @var AfasToHelloHiService
     */
    private $afasToHelloHiService;

    /**
     * AfasController constructor.
     * @param AfasOrganisationRepository $afasOrganisationRepository
     */
    public function __construct(
        AfasOrganisationRepository $afasOrganisationRepository,
        AfasPersonRepository $afasPersonRepository,
        AfasToHelloHiService $afasToHelloHiService
    ) {
        $this->afasOrganisationRepository = $afasOrganisationRepository;
        $this->afasPersonRepository = $afasPersonRepository;
        $this->afasToHelloHiService = $afasToHelloHiService;   
    }

    /**
     * Find AFAS organisation by ID
     *
     * @param [type] $id
     * @return void
     */
    public function findOrganisation($id)
    {
        $this->afasOrganisationRepository->find($id);
    }

    /**
     * Get all AFAS organisations
     *
     * @return void
     */
    public function organisations()
    {
        dd($this->afasOrganisationRepository->all());
    }

    /**
     * Get all AFAS persons
     *
     * @return void
     */
    public function persons()
    {
        dd($this->afasPersonRepository->all());
    }

    /**
     * Find AFAS person by ID
     *
     * @param [type] $id
     * @return void
     */
    public function findPerson($id)
    {
        $this->afasPersonRepository->find($id);
    }

    /**
     * Do an initial sync of AFAS -> HelloHi / MKA.
     * All rows from AFAS will be inserted into HelloHi / MKA database (per tenant).
     *
     * @return void
     */
    public function initialSyncAfas()
    {
        $this->afasToHelloHiService->syncAfasToHelloHi();
    }
}
