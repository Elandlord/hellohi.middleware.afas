<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AfasToHelloHiService;
use App\Classes\AfasClient;

use App\Models\Tenant;

class PersonController extends Controller
{
    private $afasToHelloHiService;

    public function __construct(AfasToHelloHiService $afasToHelloHiService)
    {
        $this->afasToHelloHiService = $afasToHelloHiService;   
    }

    public function syncAfas(Tenant $tenant)
    {
        $this->afasToHelloHiService->syncPersons($tenant);
    }
}
