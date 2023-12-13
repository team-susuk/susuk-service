<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Susuk {
    public static function slugToNormal($str) {
        return ucwords(str_replace('-', ' ', $str));
    }

    public static function uploadFile($file, $location = 'image')
    {
        return "storage/".Storage::disk('public')->put("uploads/{$location}", $file);
    }

    public static function showFile($url)
    {
        if ($url && (!str_contains($url, 'http://') || !str_contains($url, 'https://'))) {
            return asset($url);
        } else {
            return $url;
        }
    }
}