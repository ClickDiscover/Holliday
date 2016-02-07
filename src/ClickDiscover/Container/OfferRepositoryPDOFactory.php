<?php

namespace ClickDiscover\Container;

use Interop\Container\ContainerInterface;
use ClickDiscover\Model\OfferRepositoryPDO;

class OfferRepositoryPDOFactory {
    public function __invoke (ContainerInterface $container) {
        $pdo = $container->get(\PDO::class);
        return new OfferRepositoryPDO($pdo);
    }
}
