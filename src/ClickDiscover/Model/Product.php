<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\AbstractAggregateRoot;
use ClickDiscover\Common\Identifier;


class Product extends AbstractAggregateRoot {

    protected $name;
    protected $image;

    public function __construct (Identifier $id, string $name, string $image) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
    }
}
