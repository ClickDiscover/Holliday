<?php

namespace ClickDiscover\Model;

use Ramsey\Uuid\{Uuid, UuidInterface};


class Identifier implements Serializable {

    private $uuid;

    public function __construct ($uuid) {
        $this->uuid = $uuid;
    }

    public function toString () {
        return $this->uuid->toString();
    }

    public function __toString () {
        return $this->toString();
    }

    public function equals (Identifier $other) {
        return $this->uuid->equals($other->uuid);
    }

    public function serialize () {
        return $this->toString();
    }

    public function unserialize ($str) {
        $this->uuid = Uuid::fromString($str);
    }

    // Factory Methods

    public static function fromString(string $str): Identifier {
        return new self(Uuid::fromString($str));
    }

    public static function generate(): Identifier {
        return new self(Uuid::uuid4());
    }

}
