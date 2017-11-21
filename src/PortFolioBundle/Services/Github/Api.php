<?php
namespace PortFolioBundle\Services\Github;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Api 
{
    private $client;
    private $uri;

    public function __construct(ClientInterface $client, string $baseUri)
    {
        $this->client = $client;
        $this->baseUri = $baseUri;
    }

    public function handleCall(string $url, array $options)
    {
        $options['query'] = $options;

        return $this->client->get($this->baseUri.$url, $options);
    }

    public function handleResponse(ResponseInterface $response)
    {
        $data = json_decode($response->getBody(), true);

        return $data;
    }
}