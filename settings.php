<?php
// require_once __DIR__ . '/vendor/autoload.php';


// Locations 
define('CENTRIFUGE_ROOT', __DIR__);

date_default_timezone_set('UTC');


// Application config
return [
    'settings' => [
        'name'        => 'centrifuge',
        'hostname'    => 'Laptop',
        'environment' => 'local',
        'displayErrorDetails' => true,

        'application'          => [
            'debug'            => true,
            'mode'             => 'development',
            'click_url'        => '/admin/tracking',
            'click_step_name'  => 'id',
            'click_method'  => 'direct',
            'fallback_lander'  => 1,
            'lander_alias'     => 'content',
            'product.path'     => '/static/products/',
            'tracking'         => [
                'campaign.key' => 'keyword',
                'ad.key'       => 'ad'
            ]
        ],

        'logging' => [
            'root'  => '/tmp/centrifuge-slim3.log',
            'level' => \Monolog\Logger::DEBUG
        ],

        'cookie' => [
            'session.lifetime' => 1800,     // 30 Minutes
            'visitor.lifetime' => 33955200, // 13 Months
            'root.domain'      => ''
        ],

        'cache' => [
            'expiration'      => 3600,
            'adex.expiration' => 300,
            'root'            => '/tmp/centrifuge/'
        ],

        'hashids' => [
            'salt'      => 'MORE MONEY THAN GOD',
            'length' => 16
        ],

        'database' => [
            'pdo'         => 'pgsql:host=localhost;dbname=clickdiscover;port=5432;user=patrick',
            // 'aerospike'   => [
                // 'client' => [
                    // "hosts" => [
                        // ["addr" => "192.168.99.100", "port" => 32777]
                    // ]
                // ],
                // 'namespace' => 'thrive'
            // ]
        ],

        'paths' => [
            'root'             => __DIR__,
            'root.templates'   => __DIR__ . '/templates',
            'root.buzzlily'    => __DIR__ . '/templates/buzzlily',
            'relative.landers' => '/landers/',
            'relative.static'  => '/static/',
            'relative.product' => '/static/products/'
        ]
    ]
];

// ini_set('aerospike.key_policy', 'send');


// function print_ps($arr) {
    // return "<pre>" . print_r($arr, 1) . "</pre>";
// }

// function print_p($arr) {
    // echo print_ps($arr);
// }

// function array_value($array, $key, $default_value = null) {
        // return is_array($array) && array_key_exists($key, $array) ? $array[$key] : $default_value;
// }

