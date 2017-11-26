<?php
namespace PortFolioBundle\Services\Github;

use GuzzleHttp\ClientInterface;

class UserActivity 
{
    private $api;
    private $user;
    private $eventFactory;

    public function __construct(Api $api, string $user, EventFactory $eventFactory)
    {
        $this->api = $api;
        $this->user = $user;
        $this->eventFactory = $eventFactory;
    }

    public function getActivities(array $options = [])
    {
        $response = $this->api->handleCall('/users/'.$this->user.'/events', ['per_page' => 6]);
        $data = $this->api->handleResponse($response);

        return $this->eventFactory->createEventCollection($data);
    }
}