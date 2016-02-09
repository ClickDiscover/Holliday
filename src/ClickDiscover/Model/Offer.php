<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\AbstractAggregateRoot;
use ClickDiscover\Common\Identifier;


class Offer extends AbstractAggregateRoot {

    const CPA = 'cpa';
    const CPC = 'cpc';

    // protected $id;
    protected $product;
    protected $network;
    protected $url;
    protected $payout;
    protected $status;

    public function __construct (
        Identifier $id,
        Product $product,
        $network,
        string $url,
        float $payout,
        string $status
    )  {

        $this->id = $id;
        $this->product = $product;
        $this->network = $network;
        $this->url = $url;
        $this->payout = $payout;
        $this->status = $status;
    }
}
