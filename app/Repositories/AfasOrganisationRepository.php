<?php namespace App\Repositories;

/**
 * Interface AfasOrganisationRepository
 * @package App\Repositories
 */
interface AfasOrganisationRepository
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