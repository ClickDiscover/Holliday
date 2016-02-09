<?php

namespace ClickDiscover\Repository;

use ClickDiscover\Common\Identifier;
use ClickDiscover\Model\Slot;
use ClickDiscover\Model\SlotTrafficking;


interface SlotRepositoryInterface {
    public function get(Identifier $id);
    public function getAll();
    public function getTraffickingsFor(Slot $slot);
}

