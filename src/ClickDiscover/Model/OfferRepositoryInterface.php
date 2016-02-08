<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\Identifier;


interface OfferRepositoryInterface {
    public function get(Identifier $id);
    public function getAll();
}

