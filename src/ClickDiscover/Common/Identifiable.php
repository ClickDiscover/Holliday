<?php

namespace ClickDiscover\Common;

use ClickDiscover\Model\Identifier;

interface Identifiable {
    public function getId (): Identifier;
}
 
