<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
            ClickDiscover\Action\PingAction::class => ClickDiscover\Action\PingAction::class,
        ],
        'factories' => [
            ClickDiscover\Action\HomePageAction::class => ClickDiscover\Action\HomePageFactory::class,
            ClickDiscover\Action\GetConfigAction::class => ClickDiscover\Action\GetConfigFactory::class,
            ClickDiscover\Action\GetAllOffersAction::class => ClickDiscover\Action\GetAllOffersFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => ClickDiscover\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => ClickDiscover\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.config',
            'path' => '/api/config',
            'middleware' => ClickDiscover\Action\GetConfigAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.offers',
            'path' => '/api/offers',
            'middleware' => ClickDiscover\Action\GetAllOffersAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
