<?php

namespace ClickDiscover\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;


class GetConfigAction {

    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null) {
        return new JsonResponse($this->config);
    }

}
