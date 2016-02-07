<?php

namespace ClickDiscover\Container;

use Interop\Container\ContainerInterface;
use ClickDiscover\Model\OfferRepositoryMemory;

class OfferRepositoryMemoryFactory {
    public function __invoke (ContainerInterface $container) {
        return new OfferRepositoryMemory();
    }
}
