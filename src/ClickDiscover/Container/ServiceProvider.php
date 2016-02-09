<?php

namespace ClickDiscover\Container;

// use Slim\App;
// use Slim\Container;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use ClickDiscover\View\ViewEngine;


class ServiceProvider implements \Pimple\ServiceProviderInterface {

    protected $settings;

    public function register(\Pimple\Container $container) {
        $container['pdo'] = function ($c) {
            $pdo = new \F3\LazyPDO\LazyPDO($c['settings']['database']['pdo'], null, null, array(
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ));
            return $pdo;
        };

        // $container['creatives'] = function ($c) {
            // return new \ClickDiscover\Service\CreativeService($c['db']);
        // };

        // $container['slots'] = function ($c) {
            // return new \ClickDiscover\Service\SlotService($c['db'], $c['creatives']);
        // };

        $container['logger'] = function ($c) {
            $log = new \Monolog\Logger($c['settings']['name']);
            $log->pushHandler(new \Monolog\Handler\StreamHandler(
                $c['settings']['logging']['root'],
                $c['settings']['logging']['level']
            ));
            return $log;
        };


        // Cache
        // $container['cacheDriver'] = function ($c) {
            // $driver = new \Stash\Driver\FileSystem();
            // $driver->setOptions(array('path' => $c['settings']['cache']['root']));
            // return $driver;
        // };
        // $container['cache'] = function ($c) {
            // $cache = new \Stash\Pool($c['cacheDriver']);
            // $cache->setNamespace($c['settings']['name']);
            // return $cache;
        // };

        // $container['session.cache'] = function ($c) {
            // $sessionCache = new \Stash\Pool($c['cacheDriver']);
            // $sessionCache->setNamespace('session');
            // return $sessionCache;
        // };


        // $container['db'] = function ($c) {
            // $db = new \Flagship\Storage\QueryCache(
                // $c['pdo'],
                // $c['cache'],
                // $c['settings']['cache']['expiration']
            // );
            // $db->setLogger($c['logger']);
            // // $db->setProfiler($c['profiler']);
            // return $db;
        // };

        // $container['fs'] = function ($c) {
            // $adapter = new \League\Flysystem\Adapter\Local($c['settings']['application']['templates.path']);
            // $fs = new \League\Flysystem\Filesystem($adapter);
            // $fs->addPlugin(new \League\Flysystem\Plugin\ListWith);
            // return $fs;
        // };
    }

    public static function withSlimContainer($settings) {
        $container = new \Slim\Container($settings);
        $services  = new ServiceProvider();
        $services->register($container);
        return $container;
    }



}
