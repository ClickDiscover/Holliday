<?php

namespace ClickDiscover\Persistence;

use ClickDiscover\Common\Identifier;
use ClickDiscover\Model\Offer;
use ClickDiscover\Model\OfferRepositoryInterface;


class OfferRepositoryMemory implements OfferRepositoryInterface {
    public function get(Identifier $id) {
        new Offer(Identifier::generate(), 'cpa', 1, 2);
    }

    public function getAll() {
        $a = [];
        $a[] = new Offer(Identifier::generate(), 'cpa', 1, 2);
        $a[] = new Offer(Identifier::generate(), 'cpa', 2, 2);
        $a[] = new Offer(Identifier::generate(), 'cpa', 3, 2);
        return $a;
    }
}

