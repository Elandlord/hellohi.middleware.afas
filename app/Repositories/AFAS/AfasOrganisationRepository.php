<?php namespace App\Repositories\AFAS;

class AfasOrganisationRepository implements \App\Repositories\AfasOrganisationRepository 
{
    private $afasClient;

    /**
     * AfasOrganisationRepository constructor.
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
        $endpoint = "connectors/Organisaties";

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
        $endpoint = "connectors/Organisaties";

        $response = $this->afasClient->get($endpoint);
        
        return collect($response['rows'])->firstWhere('Organisatie_persoon', $id);
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