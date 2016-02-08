<?php

namespace ClickDiscover\Common;


abstract class AbstractAggregateRoot extends ImmutableObject implements AggregateRootInterface {

    protected $id;

    public function getId (): Identifier {
        return $this->id;
    }
}
