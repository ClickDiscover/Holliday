<?php

namespace ClickDiscover\Persistence;

use ClickDiscover\Common\Identifier;
use ClickDiscover\Model\Offer;
use ClickDiscover\Model\Product;
use ClickDiscover\Model\OfferRepositoryInterface;


class OfferRepositoryMemory implements OfferRepositoryInterface {

    protected $products;
    
    public function __construct () {
        $this->products = [
            new Product(Identifier::generate(), 'Skin Lotion', 'skin.jpg'),
            new Product(Identifier::generate(), 'Diet Pills!', 'diet.jpg'),
            new Product(Identifier::generate(), 'Shitty Ebook', 'book.jpg'),
        ];

        $this->offers = [];
        $offers = [
            new Offer (Identifier::fromString('df5e3015-b38a-308b-a0e8-3fd3e1ad52fe'), $this->products[0], 1, '', 1.00, 'good'),
            new Offer (Identifier::fromString('6453eb06-58fd-39b8-9703-a18ba03e1ab4'), $this->products[1], 1, '', 7.00, 'good'),
            new Offer (Identifier::fromString('ab99433e-53ba-30d8-b69f-73f203dcb344'), $this->products[2], 2, '', 0.23, 'good'),
        ];
        foreach ($offers as $o) {
            $this->offers[$o->id->toString()] = $o;
        }

    }


    public function get(Identifier $id) {
        if (array_key_exists($id->toString(), $this->offers)) {
            return $this->offers[$id->toString()];
        }
        return [];
    }

    public function getAll() {
        return array_values($this->offers);
    }

    public function getForSlot (Identifier $slotId) {
        return [];
    }
}

