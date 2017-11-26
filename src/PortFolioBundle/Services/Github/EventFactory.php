<?php
namespace PortFolioBundle\Services\Github;

class EventFactory
{
    private $fields = ['type', 'repo', 'payload', 'created_at'];
    private $events = [];

    public function createEvent(array $data)
    {
        if (empty($data)) {
            throw new \RuntimeException('data is empty');
        }

        foreach ($this->fields as $field) {
            if (empty($data[$field])) {
                throw new \RuntimeException('Field: '.$field.' is not found');
            }
        }

        $commit = null;
        $message = null;
        $ref = null;
        if($data['type'] === 'PushEvent') {
            $message = $data['payload']['commits'][0]['message'];
            $url = $data['payload']['commits'][0]['url'];
            $commit = substr($data['payload']['commits'][0]['sha'], 0, 7);
            $ref = $data['payload']['ref'];
        }

        if($data['type'] === 'PullRequestEvent') {
            $url = $data['repo']['url'];
            $ref = $data['payload']['pull_request']['head']['ref'];
        }

        if($data['type'] === 'CreateEvent') {
            $url = $data['repo']['url'];
            $ref = $data['payload']['ref'];
        }
    
        $this->events[] = new Event(
            $data['type'],
            $data['repo']['name'],
            $commit,
            $message,
            $url,
            $ref,
            $data['created_at'],
            $data['actor']['avatar_url']
        );
    }

    public function createEventCollection(array $events)
    {
        if (empty($events)) {
            return $this->events;
        }
        foreach($events as $event) {
            $this->createEvent($event);
        }

        return $this->events;
    }
}
