<?php namespace App\Repositories;

use HelloHi\ApiClient\Model;

/**
 * Interface HHPersonRepository
 * @package App\Repositories
 */
interface HHPersonRepository
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
     * @param $person_id
     * @return mixed
     */
    function delete($person_id);
}