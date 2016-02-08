<?php

namespace ClickDiscover\Container;

use Interop\Container\ContainerInterface;


class PDOFactory {
    public function __invoke (ContainerInterface $container) {
        $config = $container->get('config');
        $pdoUrl = $config['pdoConfig']['url'];
        return new \PDO($pdoUrl);
    }
}
