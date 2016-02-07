<?php

namespace ClickDiscover\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;

class GetConfigAction {

    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null) {
        return new JsonResponse($this->config);
    }

}
