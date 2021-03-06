<?php namespace App\Repositories\HelloHi;

use HelloHi\ApiClient\Model;
use HelloHi\ApiClient\Client;

class HHPersonRepository extends APIRepository implements \App\Repositories\HHPersonRepository {

    /**
     * @param array $include
     * @return array
     */
    function all($include = [])
    {
        return Model::all('persons', $include);
    }

    /**
     * @param $id
     * @return Model|null
     */
    function find($id)
    {
        $model = Model::byId('persons', $id);
        return $model;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $response = Model::create('persons', $data);

        if(($response) != null) {
            return $response;
        }

        $client = Client::getInstance();
        dd($client->lastError);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $model = Model::byId('persons', $id);
        return $model->update($data);
    }
    
    /**
     * @param $person_id
     * @return mixed
     */
    function delete($person_id)
    {
        $person = Model::byId('persons', $person_id);
        return $person->delete();
    }
}