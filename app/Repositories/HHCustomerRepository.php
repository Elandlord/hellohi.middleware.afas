<?php namespace App\Repositories;

use HelloHi\ApiClient\Model;

/**
 * Interface HHCustomerRepository
 * @package App\Repositories
 */
interface HHCustomerRepository
{
    /**
     * @param array $include
     * @return array
     */
    public function all($include= []);

    /**
     * @param $id
     * @return Model|null
     */
    public function find($id);

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data);

    /**
     * @param $customer_id
     * @return mixed
     */
    function delete($customer_id);
    
    /**
     * @param $customer_id
     * @param $person_id
     * @param $data
     * @return Model|array|null
     */
    public function attachPerson($customer_id, $person_id, $data);
}