<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Model;
use HelloHi\ApiClient\Client;

// Repositories
use App\Repositories\HHCustomerRepository;
use App\Repositories\HHPersonRepository;

use App\Models\Tenant;


class HelloHiController extends Controller
{
    /**
    * @var HHCustomerRepository
    */
    private $HHCustomerRepository;

    /**
    * @var HHPersonRepository
    */
    private $HHPersonRepository;

    public function __construct(
        HHCustomerRepository $HHCustomerRepository,
        HHPersonRepository $HHPersonRepository
    ) 
    {
        $this->HHCustomerRepository = $HHCustomerRepository;
        $this->HHPersonRepository = $HHPersonRepository;
    }

    public function customers()
    {
        dd($this->HHCustomerRepository->all());
    }

    public function persons()
    {
        dd($this->HHPersonRepository->all());
    }
}
