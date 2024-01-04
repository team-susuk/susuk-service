<?php

namespace App\Actions\Merchant\Order;

use Carbon\Carbon;
use App\Helpers\Susuk;
use App\Enums\OrderType;
use App\Enums\OrderStatus;
use App\Models\Data\Order;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use App\Models\Master\Profession;
use App\Models\Utils\PriceConfig;
use App\Services\Master\LanguageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderAction {
    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handleMerchant(Request $request)
    {
        DB::transaction(function () use ($request) {
            $package = PriceConfig::whereId($request->package_id)->first();
            $price = $package->price;
            if ($package->discount > 0) {
                if ($package->discount_type == 'percent') {
                    $price = $price - ($package->price * $package->discount / 100);
                } else {
                    $price -= $package->discount;
                }
            }

            $type = '';

            switch ($request->type) {
                case 'top-ads':
                    $type = OrderType::Merchant_Top_Ads;
                    break;
                case 'ads-banner':
                    $type = OrderType::Ads_Banner;
                    break;
                case 'blast':
                    $type = OrderType::Blast_Merchant;
                    break;
                case 'top-merchants':
                    $type = OrderType::Top_Merchant;
                    break;
                case 'new-merchants':
                    $type = OrderType::New_Merchant;
                    break;
                case 'add-product':
                    $type = OrderType::Add_Product;
                    break;
                case 'merchant_show_guide':
                    $type = OrderType::Merchant_Show_Guide;
                    break;
            }

            $expiredAt = null;
            if ($package->benefit_type == 'day') {
                $expiredAt = Carbon::now()->addDays($package->benefit_value);
            } else if ($package->benefit_type == 'month') {
                $expiredAt = Carbon::now()->addMonths($package->benefit_value);
            }

            $data = [
                'benefit_value' => $package->benefit_value,
                'benefit_type' => $package->benefit_type,
                'price' => $price,
                'status' => OrderStatus::Waiting_Payment,
                'type' => $type,
                'expired_at' => $expiredAt,
                'user_id' => merchant()->id,
                'user_role' => 'merchant'
            ];

            if ($request->type == 'top-ads' || $request->type == 'ads-banner') {
                $data['image'] = Susuk::uploadFile($request->file("image"));
            }

            if ($request->type == 'blast') {
                $profession = Profession::where("name", $request->profession)->first();
                $data['data'] = (object)[
                    'languages' => $request->languages,
                    'province_id' => $request->province,
                    'city_id' => $request->city,
                    'profession' => $request->profession,
                    'profession_id' => $profession ? $profession->id : ''
                ];
            }

            Order::create($data);
        });
    }

    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handleProduct(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $package = PriceConfig::whereId($request->package_id)->first();
            $price = $package->price;
            if ($package->discount > 0) {
                if ($package->discount_type == 'percent') {
                    $price = $price - ($package->price * $package->discount / 100);
                } else {
                    $price -= $package->discount;
                }
            }

            $type = '';

            switch ($request->type) {
                case 'top-ads':
                    $type = OrderType::Merchant_Top_Ads;
                    break;
                case 'ads-banner':
                    $type = OrderType::Ads_Banner;
                    break;
                case 'blast':
                    $type = OrderType::Blast_Merchant;
                    break;
                case 'special-this-month':
                    $type = OrderType::Special_This_Month;
                    break;
                case 'favorite-product':
                    $type = OrderType::Favorite_Product;
                    break;
            }

            $data = [
                'benefit_value' => $package->benefit_value,
                'benefit_type' => $package->benefit_type,
                'price' => $price,
                'status' => OrderStatus::Waiting_Payment,
                'type' => $type,
                'expired_at' => Carbon::now()->addDays($package->benefit_value),
                'user_id' => merchant()->id,
                'user_role' => 'merchant',
                'data' => (object)[
                    'product_id' => $id
                ]
            ];

            if ($request->type == 'top-ads' || $request->type == 'ads-banner') {
                $data['image'] = Susuk::uploadFile($request->file("image"));
            }

            if ($request->type == 'blast') {

                $profession = Profession::where("name", $request->profession)->first();
                $data['data'] = (object)[
                    'languages' => $request->languages[0] == 'all' ? null : $request->languages,
                    'province_id' => $request->province,
                    'city_id' => $request->city == 'all' ? null : $request->city,
                    'profession' => $request->profession,
                    'profession_id' => $profession ? $profession->id : '',
                    'product_id' => $id
                ];
            }

            Order::create($data);
        });
    }
}
