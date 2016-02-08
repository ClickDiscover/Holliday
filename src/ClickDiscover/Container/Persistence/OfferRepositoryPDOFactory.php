<?php

namespace ClickDiscover\Container\Persistence;

use Interop\Container\ContainerInterface;
use ClickDiscover\Persistence\OfferRepositoryPDO;


class OfferRepositoryPDOFactory {
    public function __invoke (ContainerInterface $container) {
        $pdo = $container->get(\PDO::class);
        return new OfferRepositoryPDO($pdo);
    }
}
