<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Utils\PriceConfig;
use Illuminate\Http\Request;

class PriceConfigController extends Controller
{
    public function subscription($type)
    {
        $plan = '';
        switch ($type) {
            case 'guide':
                $plan = 'guide_show_merchant';
                break;
            case 'merchant':
                $plan = 'merchant_show_guide';
                break;
        }

        return response()->json(PriceConfig::where("type", $plan)->first());
    }
}
