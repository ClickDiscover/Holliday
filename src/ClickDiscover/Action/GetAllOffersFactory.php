<?php

namespace ClickDiscover\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class GetAllOffersFactory {
    public function __invoke(ContainerInterface $container) {
        // $offerRepository = $container->has()
        $pdo = new \PDO($container->get('config')['pdo']['url']);
        $offerRepository = new \ClickDiscover\Model\OfferRepositoryPDO($pdo);
        $container->setService('offers', $offerRepository);

        return new GetAllOffersAction($offerRepository);
    }
}
