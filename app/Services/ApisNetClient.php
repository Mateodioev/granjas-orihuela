<?php

namespace App\Services;

use App\Exceptions\DniNotFoundException;
use App\Schema\PublicUserSchema;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApisNetClient
{
    private string $token;
    private Client $client;

    public function __construct()
    {
        $this->token = config('services.apis_net.token');
        $this->client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);
    }

    /**
     * @throws GuzzleException
     */
    private function makeRequest(array $query, string $endpoint, string $referer): array
    {
        $result = $this->client->request('GET', $endpoint, [
            'http_errors' => false,
            'connect_timeout' => 5,
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
                'Referer' => "https://apis.net.pe$referer",
                'User-Agent' => 'laravel/guzzle',
                'Accept' => 'application/json',
            ],
            'query' => $query,
        ]);
        return json_decode($result->getBody()->getContents(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function dni(string $dni): PublicUserSchema
    {
        $data = $this->makeRequest(['numero' => $dni], '/v2/reniec/dni', '/consulta-dni-api');
        if (isset($data['error']) || isset($data['message'])) {
            throw new DniNotFoundException($dni);
        }

        return PublicUserSchema::fromApisNetResponse($data);
    }

    /**
     * @param string $ruc
     * @throws GuzzleException
     */
    public function ruc(string $ruc)
    {
        return $this->makeRequest(['numero' => $ruc], '/v2/sunat/ruc', '/api-ruc');
    }

    /**
     * @throws GuzzleException
     */
    public function tipoCambio(): array
    {
        return $this->makeRequest([], '/v2/sunat/tipo-cambio', '/api-sunat-tipo-de-cambio');
    }
}