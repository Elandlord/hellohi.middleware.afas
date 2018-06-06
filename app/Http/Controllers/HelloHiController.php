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
        $customers = $this->HHCustomerRepository->all();
        dd($customers);

        // To clean-up all the customers
        // for($i = 0; $i <= ($customers->total() / 15); $i++){
        //     $customers = $this->HHCustomerRepository->all();

            
        //     $customers->each(function($customer) {
        //         if(!$customer->name != "Customer 1" || !$customer->name != "Customer 2" || !$customer->name != "Customer 3"){
        //             $this->HHCustomerRepository->delete($customer->id);
        //         }
        //     });
        // }
    }

    public function persons()
    {
        dd($this->HHPersonRepository->all());
    }
}
