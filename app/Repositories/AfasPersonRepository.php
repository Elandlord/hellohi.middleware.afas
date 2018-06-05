<?php namespace App\Repositories;

/**
 * Interface AfasPersonRepository
 * @package App\Repositories
 */
interface AfasPersonRepository
{
    /**
     * @return array
     */
    public function all();

    /**
     * @param $id
     * @return |null
     */
    public function find($id);

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $id
     * @return mixed
     */
    function delete($id);
}