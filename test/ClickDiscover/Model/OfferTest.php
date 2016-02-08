<?php

namespace ClickDiscover\Model;

use Illuminate\Contracts\Arrayable;
use ClickDiscover\Common\{AbstractAggregateRoot, Identifier, ImmutableObject};
use ClickDiscover\Model\Offer;


class OfferTest extends \PHPUnit_Framework_TestCase {

    public function testInterface () {
        $uuid = Identifier::generate();
        $p = new Offer ($uuid, Offer::INCENTIVE_CPA, 1, 1);
        
        $this->assertTrue ($p instanceof Offer);
        $this->assertTrue ($p instanceof AbstractAggregateRoot);
        $this->assertTrue ($p instanceof ImmutableObject);
        $this->assertTrue ($p->getId() instanceof Identifier);
    }

    public function testGetters () {
        $uuid = Identifier::generate();
        $p = new Offer ($uuid, Offer::INCENTIVE_CPA, 1, 1);
        
        $this->assertTrue ($p->getId() === $uuid);
        $this->assertEquals ($p->payoutType, Offer::INCENTIVE_CPA);
    }

    public function testToArray () {
        $uuid = Identifier::generate();
        $p = new Offer ($uuid, Offer::INCENTIVE_CPA, 1, 1);
        $arr = [
            'id' => $p->getId()->toString(),
            'payoutType' => Offer::INCENTIVE_CPA,
            'product' => 1,
            'network' => 1
        ];

        $this->assertEquals($p->toArray(), $arr);
        
    }
}
