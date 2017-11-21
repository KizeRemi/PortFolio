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
        $response = $this->api->handleCall('/users/'.$this->user.'/events', $options);
        return $this->api->handleResponse($response);
    }
}