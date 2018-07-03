<?php

namespace Domain\Core\ValueObjects;

use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

class BaseId
{
    /**
     * @var String
     */
    private $id;

    public function __construct(String $id)
    {
        $this->isValid($id);
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getId(): String
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getId();
    }

    private function isValid($id): void
    {
        if(! Uuid::isValid($id)) {
            throw new InvalidUuidStringException('The id is not correct');
        }
    }
}