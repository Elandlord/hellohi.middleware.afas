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

    public function organisations()
    {
        dd($this->afasOrganisationRepository->all());
    }

    public function persons()
    {
        dd($this->afasPersonRepository->all());
    }

    public function initialSyncAfas()
    {
        $this->afasToHelloHiService->syncAfasToHelloHi();
    }
}
