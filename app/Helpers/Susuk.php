<?php

namespace App\Helpers;

use App\Models\Utils\Setting;
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

    public static function formatIndonesianPhoneNumber($number) {
        $number = preg_replace('/\D/', '', $number);
        $start = substr($number, 0, 1);
        $prefix = '62';

        if ($start == '0') {
            return $prefix.ltrim($number, '0');
        } else {
            if (substr($number, 0, 2) != '62') {
                return $prefix.$number;
            }
        }

        return $number;
    }

    public static function getBankInformation()
    {
        $rekening_number = Setting::where("name", "rekening_number")->first();
        $rekening_bank = Setting::where("name", "rekening_bank")->first();
        $rekening_name = Setting::where("name", "rekening_name")->first();
        $whatsapp = Setting::where("name", "whatsapp")->first();

        return (object) [
            "rekening_number" => $rekening_number ? $rekening_number->value : '',
            "rekening_bank" => $rekening_bank ? $rekening_bank->value : '',
            "rekening_name" => $rekening_name ? $rekening_name->value : '',
            "whatsapp" => $whatsapp ? $whatsapp->value : ''
        ];
    }
    
}