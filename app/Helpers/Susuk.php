<?php

namespace App\Helpers;

use App\Models\Utils\Setting;
use App\Services\Utils\SettingService;
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
        $allowed = [
            "rekening_number",
            "rekening_bank",
            "rekening_name",
            "whatsapp"
        ];

        $settingService = new SettingService();
        $setting = $settingService->findAll($allowed);
        return (object) [
            "rekening_number" => $setting->rekening_number ?? '',
            "rekening_bank" => $setting->rekening_bank ?? '',
            "rekening_name" => $setting->rekening_name ?? '',
            "whatsapp" => $setting->whatsapp ?? ''
        ];
    }
    
    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}