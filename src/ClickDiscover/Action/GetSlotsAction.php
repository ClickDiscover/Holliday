<?php

namespace ClickDiscover\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

use ClickDiscover\Repository\SlotRepositoryInterface;


class GetSlotsAction {

    private $slots;

    public function __construct(SlotRepositoryInterface $slots) {
        $this->slots = $slots;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null) {
        // return new JsonResponse($this->offerRepository);
        // return new JsonResponse($this->offerRepository->get('df5e3015-b38a-308b-a0e8-3fd3e1ad52fe')->toArray());



        return new JsonResponse(array_map(function ($x) {
            return $x->toArray();
        }, $this->slots->getAll()));
        // return new JsonResponse(array_map(['\ClickDiscover\Model\Offer', 'toArray'], $this->offerRepository->getAll()));
    }

}
