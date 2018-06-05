<?php namespace App\Repositories\HelloHi;

use HelloHi\ApiClient\Client;

class APIRepository {
    /**
     * @var Client
     */
    private $client;
    /**
     * ThreadRepository constructor.
     * @param Client $client
     */
    function __construct(Client $client)
    {
        $this->client = $client;
    }
}