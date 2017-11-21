<?php
namespace PortFolioBundle\Services\Github;

use GuzzleHttp\ClientInterface;

class UserActivity {

    private $api;
    private $user;

    public function __construct(Api $api, string $user)
    {
        $this->api = $api;
        $this->user = $user;
    }

    public function getActivities(array $options = [])
    {
        $response = $this->api->handleCall('/repos/'.$this->user.'/portfolio/commits', $options);
        return $this->api->handleResponse($response);
    }
}