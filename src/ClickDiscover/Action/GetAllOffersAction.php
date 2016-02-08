<?php

namespace ClickDiscover\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

use ClickDiscover\Model\OfferRepositoryInterface;


class GetAllOffersAction {

    private $offerRepository;

    public function __construct(OfferRepositoryInterface $offerRepository) {
        $this->offerRepository = $offerRepository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null) {
        // return new JsonResponse($this->offerRepository);
        // return new JsonResponse($this->offerRepository->get('df5e3015-b38a-308b-a0e8-3fd3e1ad52fe')->toArray());



        return new JsonResponse(array_map(function ($x) {
            return $x->toArray();
        }, $this->offerRepository->getAll()));
        // return new JsonResponse(array_map(['\ClickDiscover\Model\Offer', 'toArray'], $this->offerRepository->getAll()));
    }

}
