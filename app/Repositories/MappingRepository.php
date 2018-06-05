<?php namespace App\Repositories;

use App\Models\Mapping;

/**
 * Interface ACTaskRepository
 * @package App\Repositories
 */
interface MappingRepository
{
    /**
     * @return array
     */
    public function all();

    /**
     * @param $id
     * @return Mapping|null
     */
    public function find($id);

    /**
     * @param $type
     * @param $local_id
     * @return Mapping|null
     */
    public function findByLocalId($type, $local_id);

    /**
     * @param $type
     * @param $remote_id
     * @return Mapping|null
     */
    public function findByRemoteId($type, $remote_id);

    /**
     * @param $type
     * @param $remote_client_number
     * @return Mapping|null
     */
    public function findByRemoteClientNumber($type, $remote_client_number);

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $mapping_id
     * @return mixed
     * @throws \Exception
     */
    function deleteById($mapping_id);

    /**
     * @param Mapping $mapping
     * @return mixed
     */
    
    function delete(Mapping $mapping);
}