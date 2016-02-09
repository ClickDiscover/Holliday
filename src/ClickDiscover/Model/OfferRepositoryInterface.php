<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\Identifier;


interface OfferRepositoryInterface {
    public function get(Identifier $id);
    public function getAll();
    public function getForSlot(Identifier $slotId);

    public function getBestCreatives(Offer $offer);
}

