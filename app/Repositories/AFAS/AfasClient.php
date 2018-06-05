<?php namespace App\Repositories\AFAS;

use GuzzleHttp;
use Illuminate\Http\UploadedFile;

class AfasClient
{
    CONST ENV_NUMBER = "54808AC";
    CONST API_KEY = "44EEA94E783E4D718DD5656197C6AF02";
    CONST ENV_KEY = "6A9C5FB841AF42DE3F5432B892B1DDE2";
    CONST USERNAME = "54808.Rapide";
    CONST PASSWORD = "R@p1dEk0ppeling!";
    CONST TOKEN = "<token><version>1</version><data>724077FCAA444A9AB95E2BB4AC260D3E906759614F4439BC8C028B10C2D6BA6A</data></token>";

    private $client;

    private $baseUrl;
    private $afasToken;

    /**
     * AfasClient constructor.
     * @param $baseUrl
     */
    public function __construct($baseUrl, $afasToken)
    {
        $this->baseUrl = $baseUrl;
        $this->afasToken = $afasToken;

        $this->client = new GuzzleHttp\Client([
            
        ]);
    }

    /**
     * @param $endpoint
     * @param array $headers
     * @return array|mixed|\Psr\Http\Message\ResponseInterface
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function get($endpoint = "", $headers = [], $skip = 0, $limit = 100)
    {
        $url = $this->baseUrl . $endpoint;

        $headers = [
            'Authorization' => "AfasToken " . base64_encode($this->afasToken)
        ];

        $response = $this->client->request('GET', $url, [
            'headers' => $headers
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // public function getOrganisations()
    // {
    //     return $this->get('Organisaties', null, 0, 300);
    // }

    // public function getPersons()
    // {
    //     return $this->get('Personen', null, 0, 300);
    // }

    // public function saveOrganisation()
    // {
    //     return $this->post('Organisaties', [
    //         "Organisatie_persoon" => 10001123,
    //         "Soort_contact" => "Organisatie",
    //         "Naam" => "Eric test",
    //         "Straat" => "Noorderhaven",
    //         "Huisnummer" => "46",
    //         "Postcode" => "9712VL",
    //         "Woonplaats" => "Groningen",
    //         "Voornaam" => "Eric",
    //         "Voorletters" => "E",
    //         "Achternaam" => "Landheer",
    //         "Geslacht_code" => "null",
    //         "Titel_voor" => "de heer",
    //         "Titel_achter" => "null",
    //     ]);
    // }
}