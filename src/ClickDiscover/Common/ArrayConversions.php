<?php

namespace ClickDiscover\Common;

use Illuminate\Contracts\Support\Arrayable;


trait ArrayConversions {

    public function toArray() {
        $vars = get_object_vars($this);
        $vars = array_filter($vars, function ($x) {
            return $x[0] !== '_';
        }, ARRAY_FILTER_USE_KEY);
        $copy = [];
        foreach ($vars as $key => $val) {
            if ($val instanceof Arrayable) {
                $copy[$key] = $val->toArray();
            } elseif ($val instanceof Identifier) {
                $copy[$key] = $val->toString();
            } else {
                $copy[$key] = $val;
            }
        }
        return $copy;
    }
}
