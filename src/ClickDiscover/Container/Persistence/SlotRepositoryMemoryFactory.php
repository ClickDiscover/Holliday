<?php

namespace ClickDiscover\Container\Persistence;

use Interop\Container\ContainerInterface;
use ClickDiscover\Repository\SlotRepositoryMemory;
use ClickDiscover\Model\OfferRepositoryInterface;


class SlotRepositoryMemoryFactory {
    public function __invoke (ContainerInterface $container) {
        return new SlotRepositoryMemory($container->get(OfferRepositoryInterface::class));
    }
}
