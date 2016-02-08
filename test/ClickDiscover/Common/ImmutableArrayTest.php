<?php

namespace ClickDiscover\Common;

use ClickDiscover\Common\ImmutableArray;
use ClickDiscover\Common\CantModifyImmutables;


class ImmutableArrayTest extends \PHPUnit_Framework_TestCase {

    public function testImmutability () {
        $this->expectException(CantModifyImmutables::class);
        $arr = new ImmutableArray([1,2,3]);
        $arr[0] = 1;
    }
}
