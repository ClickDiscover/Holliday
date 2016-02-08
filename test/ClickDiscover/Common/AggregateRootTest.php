<?php

namespace ClickDiscover\Common;

use Illuminate\Contracts\Arrayable;
use ClickDiscover\Common\{AbstractAggregateRoot, Identifier, ImmutableObject};


class TestProduct extends AbstractAggregateRoot {
    protected $foo;
    protected $bar;

    public function __construct (Identifier $id, string $foo, int $bar) {
        $this->id = $id;
        $this->foo = $foo;
        $this->bar = $bar;
    }
}

class ContainerProduct extends AbstractAggregateRoot {
    protected $baz;
    protected $product;

    public function __construct (Identifier $id, int $baz, TestProduct $product) {
        $this->id = $id;
        $this->baz = $baz;
        $this->product = $product;
    }
}


class AggregateRootTest extends \PHPUnit_Framework_TestCase {

    public function testInterface () {
        $p = new TestProduct (Identifier::generate(), 'Whoa!', 10);
        
        $this->assertTrue ($p instanceof AggregateRootInterface);
        $this->assertTrue ($p instanceof ImmutableObject);
        $this->assertTrue ($p->getId() instanceof Identifier);
    }

    public function testArrayble () {
        $p = new TestProduct (Identifier::generate(), 'Whoa!', 10);

        $arr = [
        
            'foo' => 'Whoa!',
            'bar' => 10,
            'id' => $p->getId()->toString()
        ];
        $this->assertEquals($p->toArray(), $arr);
    }

    public function testNesting () {
        $p = new TestProduct (Identifier::generate(), 'Whoa!', 10);
        $c = new ContainerProduct (Identifier::generate(), 20, $p);

        $arr = [
        
            'foo' => 'Whoa!',
            'bar' => 10,
            'id' => $p->getId()->toString()
        ];
        $carr = [
            'id' => $c->id->toString(),
            'baz' => 20,
            'product' => $arr
        ];

        $this->assertEquals($c->toArray(), $carr);
    }
}
