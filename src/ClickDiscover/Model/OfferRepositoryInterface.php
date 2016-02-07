<?php

namespace ClickDiscover\Model;


interface OfferRepositoryInterface {
    public function get(string $id);
    public function getAll();
}

