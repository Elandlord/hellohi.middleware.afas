<?php namespace App\Repositories\HelloHi;

use HelloHi\ApiClient\Model;

class HHCustomerRepository extends APIRepository implements \App\Repositories\HHCustomerRepository {
    /**
     * @param array $include
     * @return array
     */
    function all($include = [])
    {
        return Model::all('customers', $include);
    }
    /**
     * @param $id
     * @return Model|null
     */
    function find($id)
    {
        $model = Model::byId('customers', $id);
        return $model;
    }
    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return Model::create('customers', $data);
    }
    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $model = Model::byId('customers', $id);
        return $model->update($data);
    }
    /**
     * @param $customer_id
     * @return mixed
     */
    function delete($customer_id)
    {
        $customer = Model::byId('customers', $customer_id);
        return $customer->delete();
    }
    /**
     * @param $customer_id
     * @param $person_id
     * @param $data
     * @return Model|array|null
     */
    public function attachPerson($customer_id, $person_id, $data)
    {
        return Model::create('customers/'.$customer_id.'/employees/'.$person_id, $data);
    }
}