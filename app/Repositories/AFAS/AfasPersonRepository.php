<?php namespace App\Repositories\AFAS;

class AfasPersonRepository implements \App\Repositories\AfasPersonRepository 
{
    private $afasClient;

    /**
     * AfasPersonRepository constructor.
     * @param AfasClient $afasClient
     */
    public function __construct(AfasClient $afasClient)
    {
        $this->afasClient = $afasClient;
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function all()
    {
        $endpoint = "connectors/Personen";

        $response = $this->afasClient->get($endpoint);
        return $response['rows'];
    }

    /**
     * @param $id
     * @return null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function find($id)
    {
        $endpoint = "connectors/Personen/" . $id;

        $response = $this->afasClient->get($endpoint);
        return $response;
    }

    /**
     * @param $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($data)
    {

    }

     /**
     * @param $id
     * @return mixed
     */
    function delete($id)
    {

    }
}