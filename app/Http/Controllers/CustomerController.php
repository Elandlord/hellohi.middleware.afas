<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AfasToHelloHiService;
use App\Classes\AfasClient;

class CustomerController extends Controller
{
    private $afasToHelloHiService;

    public function __construct(AfasToHelloHiService $afasToHelloHiService)
    {
        $this->afasToHelloHiService = $afasToHelloHiService;   
    }

    public function syncAfas()
    {
        $this->afasToHelloHiService->syncOrganisations();
    }
}
