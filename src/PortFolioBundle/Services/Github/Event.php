<?php
namespace PortFolioBundle\Services\Github;

class Event
{
    private $type;
    private $name;
    private $message;
    private $url;
    private $ref;
    private $createdAt;

    public function __construct(
        string $type,
        string $name,
        string $message = null,
        string $url,
        string $ref = null,
        string $createdAt
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->message = $message;
        $this->url = $url;
        $this->ref = $ref;
        $this->createdAt = $createdAt;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getRef()
    {
        return $this->ref;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}