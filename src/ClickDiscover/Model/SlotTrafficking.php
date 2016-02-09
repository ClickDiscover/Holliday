<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\AbstractAggregateRoot;
use ClickDiscover\Common\Identifier;


class SlotTrafficking extends AbstractAggregateRoot {

    // protected $weight;
    protected $slot;
    protected $offer;
    protected $weight; // [0..1.0] - Measures probability of click on offer for this slot


    public function __construct (Identifier $id, Slot $slot, Offer $offer, float $weight) {
        $this->id = $id;
        $this->slot = $slot;
        $this->offer = $offer;
        $this->weight = $weight;
    }
}
