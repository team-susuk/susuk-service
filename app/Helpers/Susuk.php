<?php

namespace App\Helpers;

class Susuk {
    public static function slugToNormal($str) {
        return ucwords(str_replace('-', ' ', $str));
    }
}