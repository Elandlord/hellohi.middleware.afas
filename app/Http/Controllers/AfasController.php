<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\AfasClient;

// Repositories
use App\Repositories\AfasOrganisationRepository;

class AfasController extends Controller
{
     /**
     * @var AfasOrganisationRepository
     */
    private $afasOrganisationRepository;

    /**
     * AfasController constructor.
     * @param AfasOrganisationRepository $afasOrganisationRepository
     */
    public function __construct(
        AfasOrganisationRepository $afasOrganisationRepository
    ) {
        $this->afasOrganisationRepository = $afasOrganisationRepository;
    }

    public function index()
    {
        $this->afasOrganisationRepository->all();
    }
}
