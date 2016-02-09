<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\AbstractAggregateRoot;
use ClickDiscover\Common\Identifier;


class Creative extends AbstractAggregateRoot {

    protected $headline;
    protected $content;
    protected $cta;

    public function __construct (Identifier $id, string $headline, string $content,  $cta) {
        $this->id = $id;
        $this->headline = $headline;
        $this->content = $content;
        $this->cta = $cta;
    }
}
