<?php

namespace ClickDiscover\Model;

class OfferRepositoryMemory implements OfferRepositoryInterface {
    public function get(string $id) {
        new Offer('1', 'cpa', 1, 2);
    }

    public function getAll() {
        $a = [];
        $a[] = new Offer('1', 'cpa', 1, 2);
        $a[] = new Offer('2', 'cpa', 2, 2);
        $a[] = new Offer('3', 'cpa', 3, 2);
        return $a;
    }
}

