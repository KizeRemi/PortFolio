<?php
namespace PortFolioBundle\Services\Github;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class Api 
{
    private $client;
    private $uri;
    private $token;

    public function __construct(ClientInterface $client, string $token, string $baseUri)
    {
        $this->client = $client;
        $this->baseUri = $baseUri;
        $this->token = $token;
    }

    public function handleCall(string $url, array $options)
    {
        $options['query'] = $options;
        $options['headers'] = ['Authorization' => 'token '.$this->token];

        try {
            return $this->client->get($this->baseUri.$url, $options);
        }
        catch(RequestException $e) {
            return $e->getResponse();
        }
    }

    public function handleResponse(ResponseInterface $response = null)
    {
        $data = [];
        if ($response) {
            $data = json_decode($response->getBody(), true);
        }

        return $data;
    }
}