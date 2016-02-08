<?php

namespace ClickDiscover\Persistence;

use ClickDiscover\Model\Offer;
use ClickDiscover\Model\OfferRepositoryInterface;


class OfferRepositoryPDO implements OfferRepositoryInterface {

    public function __construct ($pdo) {
        $this->db = $pdo;
    }

    public function get(string $id) {
        // return array_map([self::class, 'fromArray'], $this->db->query("SELECT * FROM offers WHERE uuid = '$id'")->fetch());
        $res = $this->db->query("SELECT * FROM offers WHERE uuid = '$id'", \PDO::FETCH_ASSOC)->fetch();
        $arr = OfferRepositoryPDO::fromArray($res);
        return $arr;
    }

    public function getAll() {
        return array_map(
            [self::class, 'fromArray'],
            $this->db->query('SELECT * FROM offers', \PDO::FETCH_ASSOC)->fetchAll()
        );
    }

    public static function fromArray($arr): Offer {
        return new Offer(
            $arr['uuid'],
            $arr['incentive'],
            $arr['product_id'],
            $arr['network_id']
        );
    }
}

