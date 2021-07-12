<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Exception;
use Illuminate\Support\Collection;

/**
 * Class DocApiService
 * @package App\Services
 */
class DocApiService
{
    /**
     * @var Client
     */
    public Client $client;

    /**
     * DocAPIService constructor.
     */
    public function __construct()
    {
        $this->client();
    }

    public function getAllAssets(string $assetType): Collection
    {
        return collect(json_decode($this->client->get($assetType))->getBody()->getContents());
    }


    private function client(): Client
    {
        return $this->client = new Client(
            [
                'base_uri' => config('doc.api-url'),
                'headers' => [
                    'X-API-KEY' => config('doc.api-key'),
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ]
        );
    }
}