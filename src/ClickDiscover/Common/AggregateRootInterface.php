<?php

namespace ClickDiscover\Common;

use Illuminate\Contracts\Support\Arrayable;
use ClickDiscover\Common\Identifier;


interface AggregateRootInterface extends Arrayable {
    public function getId (): Identifier;
}

