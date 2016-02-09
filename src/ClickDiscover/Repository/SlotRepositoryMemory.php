<?php

namespace ClickDiscover\Repository;

use ClickDiscover\Common\Identifier;
use ClickDiscover\Model\Offer;
use ClickDiscover\Model\Product;
use ClickDiscover\Model\Slot;
use ClickDiscover\Model\SlotTrafficking;

use ClickDiscover\Model\OfferRepositoryInterface;


class SlotRepositoryMemory implements SlotRepositoryInterface {

    
    public function __construct (OfferRepositoryInterface $offers) {

        $this->offers = $offers->getAll();

        $this->slots = [
            new Slot(Identifier::generate(), Slot::HOT, 'slot.twig', 'Creative1'),
            new Slot(Identifier::generate(), Slot::HOT, 'slot.twig', 'Creative2'),
            new Slot(Identifier::generate(), Slot::HOT, 'slot.twig', 'Creative3'),
        ];

        $this->traffickings = [];

        foreach ($this->offers as $off) {
            foreach ($this->slots as $slot) {
                $this->traffickings[] = new SlotTrafficking(Identifier::generate(), $slot, $off, 1.0);
            }
        }
    }


    public function get(Identifier $id) {
        if (array_key_exists($id->toString(), $this->slots)) {
            return $this->slots[$id->toString()];
        }
        return [];
    }

    public function getAll() {
        return array_values($this->traffickings);
    }

    public function getTraffickingsFor (Slot $slotId) {
        return [];
    }
}

