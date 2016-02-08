<?php

namespace ClickDiscover\Container\Persistence;

use Interop\Container\ContainerInterface;
use ClickDiscover\Persistence\OfferRepositoryMemory;


class OfferRepositoryMemoryFactory {
    public function __invoke (ContainerInterface $container) {
        return new OfferRepositoryMemory();
    }
}
