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

        if($data['type'] === 'PushEvent') {
            $message = $data['payload']['commits'][0]['message'];
            $url = $data['payload']['commits'][0]['url'];
        }

        if($data['type'] === 'CreateEvent') {
            $message =null;
            $url = $data['repo']['url'];
        }
    
        $this->events[] = new Event(
            $data['type'],
            $data['repo']['name'],
            $message,
            $url,
            $data['payload']['ref'],
            $data['created_at']
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
        dump($this->events);
        return $this->events;
    }
}
