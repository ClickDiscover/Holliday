<?php

namespace ClickDiscover\Model;

use ClickDiscover\Common\AbstractAggregateRoot;
use ClickDiscover\Common\Identifier;


class Slot extends AbstractAggregateRoot {

    // Statuses
    const HOT = 'hot';
    const AMAZON = 'amazon';
    const SAFE = 'safe';

    protected $status;
    protected $baseTemplate;
    protected $creative;

    public function __construct (Identifier $id, string $status, string $baseTemplate,  $creative) {
        $this->id = $id;
        $this->status = $status;
        $this->baseTemplate = $baseTemplate;
        $this->creative = $creative;
    }
}
