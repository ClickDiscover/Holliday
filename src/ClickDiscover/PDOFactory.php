<?php

namespace ClickDiscover;


class PDOFactory {
    public function __invoke ($container) {
        $config = $container->get('config');
        $pdoUrl = $config['pdo']['url'];
        return new \PDO($pdoUrl);
    }
}
