<?php

namespace ClickDiscover\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class GetConfigFactory {
    public function __invoke(ContainerInterface $container) {
        $config   = $container->get('config');

        return new GetConfigAction($config);
    }
}
