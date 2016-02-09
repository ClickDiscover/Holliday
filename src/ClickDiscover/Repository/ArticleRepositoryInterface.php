<?php

namespace ClickDiscover\Repository;

use ClickDiscover\Common\Identifier;
use ClickDiscover\Model\Article;
use ClickDiscover\Model\Slot;
use ClickDiscover\Model\SlotTrafficking;


interface ArticleRepositoryInterface {
    public function get(Identifier $id);
    public function getAll();

    // Returns array[Offer]
    public function getBestOffers(Article $article);
    public function getBestCreatives(Article $article);
}

