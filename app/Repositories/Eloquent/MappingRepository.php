<?php namespace App\Repositories\Eloquent;

use App\Models\Mapping;

class MappingRepository implements \App\Repositories\MappingRepository
{
    /**
     * @return array
     */
    public function all()
    {
        return Mapping::all();
    }

    /**
     * @param $id
     * @return Mapping|null
     */
    public function find($id)
    {
        return Mapping::find($id);
    }

    /**
     * @param $type
     * @param $local_id
     * @return Mapping|null
     */
    public function findByLocalId($type, $local_id)
    {
        return Mapping::where('type', $type)->where('local_id', $local_id)->first();
    }

    /**
     * @param $type
     * @param $remote_id
     * @return Mapping|null
     */
    public function findByRemoteId($type, $remote_id)
    {
        return Mapping::where('type', $type)->where('remote_id', $remote_id)->first();
    }

    /**
     * @param $type
     * @param $remote_client_number
     * @return Mapping|null
     */
    public function findByRemoteClientNumber($type, $remote_client_number)
    {
        return Mapping::where('type', $type)->where('remote_client_number', $remote_client_number)->first();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $mapping = new Mapping($data);
        return $mapping->save();
    }

    /**
     * @param $mapping_id
     * @return mixed
     * @throws \Exception
     */
    function deleteById($mapping_id)
    {
        $mapping = $this->find($mapping_id);
        return $mapping->delete();
    }
    
    /**
     * @param Mapping $mapping
     * @return mixed
     * @throws \Exception
     */
    function delete(Mapping $mapping)
    {
        return $mapping->delete();
    }
}