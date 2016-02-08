<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\AbstractAggregateRoot;
use ClickDiscover\Common\Identifier;


class Article extends AbstractAggregateRoot {

    protected $title;
    protected $templateFile;
    protected $slots;

    // $content/$text, $summary, $headline, $category?

    public function __construct (Identifier $id, string $title, string $templateFile, $slots = []) {
        $this->id = $id;
        $this->title = $title;
        $this->templateFile = $templateFile;
        $this->slots = $slots;
    }

    public function addSlot($slot) {
        $this->slots[] = $slot;
    }
}
