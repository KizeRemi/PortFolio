<?php
namespace PortFolioBundle\Services\Github;

class Event
{
    private $type;
    private $name;
    private $commit;
    private $message;
    private $url;
    private $ref;
    private $createdAt;
    private $avatarUrl;

    public function __construct(
        string $type,
        string $name,
        string $commit = null,
        string $message = null,
        string $url,
        string $ref = null,
        string $createdAt,
        string $avatarUrl
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->commit = $commit;
        $this->message = $message;
        $this->url = $url;
        $this->ref = $ref;
        $this->createdAt = $createdAt;
        $this->avatarUrl = $avatarUrl;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCommit()
    {
        return $this->commit;
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

    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }
}