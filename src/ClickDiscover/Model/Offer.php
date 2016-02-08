<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\AbstractAggregateRoot;
use ClickDiscover\Common\Identifier;


class Offer extends AbstractAggregateRoot {

    const INCENTIVE_CPA = 'cpa';
    const INCENTIVE_CPC = 'cpc';

    // protected $id;
    protected $payoutType;
    protected $product;
    protected $network;

    public function __construct (Identifier $id, string $payoutType, $product, $network) {
        $this->id = $id;
        $this->payoutType = $payoutType;
        $this->product = $product;
        $this->network = $network;
    }

    // public function id(): Identifier {
        // return $this->id;
    // }

    // public function payoutType(): string {
        // return $this->payoutType;
    // }

    // public function product(): string {
        // return $this->product;
    // }
    // public function network(): string {
        // return $this->network;
    // }

    // public function toArray(): array {
        // return [
            // 'id' => $this->id,
            // 'payoutType' => $this->payoutType,
            // 'product' => $this->product,
            // 'network' => $this->network
        // ];
    // }
}
