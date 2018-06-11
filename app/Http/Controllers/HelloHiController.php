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

    /**
     * Get all customers from HelloHi API.
     *
     * @return void
     */
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

    /**
     * Find HelloHi customer by ID.
     *
     * @param [type] $id
     * @return void
     */
    public function findCustomer($id)
    {
        $customer = $this->HHCustomerRepository->find($id);
        return $customer;
    }

    /**
     * Get all persons from HelloHi API.
     *
     * @return void
     */
    public function persons()
    {
        $persons = $this->HHPersonRepository->all();
        dd($persons);

        // To clean-up all the persons
        // for($i = 0; $i <= ($persons->total() / 15); $i++){
        //     $persons = $this->HHPersonRepository->all();

        //     $persons->each(function($person) {
        //         $person_array = [
        //             "One",
        //             "Admin",
        //             "Kantoor",
        //             "Marijke",
        //             "One",
        //             "One",
        //         ];

        //         if(!in_array($person->first_name, $person_array)){
        //             $this->HHPersonRepository->delete($person->id);
        //         }
        //     });
        // }
    }

    /**
     * Find HelloHi person by ID
     *
     * @param [type] $id
     * @return void
     */
    public function findPerson($id)
    {
        $person = $this->HHPersonRepository->find($id);
        return $person;
    }
}
