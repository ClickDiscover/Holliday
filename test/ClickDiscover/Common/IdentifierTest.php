<?php

namespace ClickDiscover\Common;

use ClickDiscover\Common\Identifier;


class IdentifierTest extends \PHPUnit_Framework_TestCase {

    public function testBogusString() {
        $this->expectException(\InvalidArgumentException::class);
        $id = Identifier::fromString('asd');
    }

    public function testCreation () {
    
        $id = Identifier::fromString('1fb5c69d-5435-3a4a-aca2-e4d4269f4874');

        $this->assertTrue($id instanceof \Serializable);
        $this->assertTrue($id->toString() === '1fb5c69d-5435-3a4a-aca2-e4d4269f4874');
        $this->assertAttributeInstanceOf(\Ramsey\Uuid\UuidInterface::class, 'uuid', $id);
    }

    public function testGeneration () {
        $id = Identifier::generate();
        $this->assertTrue(\Ramsey\Uuid\Uuid::isValid($id->toString()));
    }

    public function testCompare () {
        $id  = Identifier::fromString('1fb5c69d-5435-3a4a-aca2-e4d4269f4874');
        $id2 = Identifier::fromString('1fb5c69d-5435-3a4a-aca2-e4d4269f4874');
        $id3 = Identifier::generate();

        $this->assertTrue($id->equals($id2));
        $this->assertTrue($id == $id2);
        $this->assertFalse($id->equals($id3));
        $this->assertFalse($id == $id3);
    
    }
}
