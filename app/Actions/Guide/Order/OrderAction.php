<?php

namespace App\Actions\Guide\Order;

use Carbon\Carbon;
use App\Enums\OrderType;
use App\Enums\OrderStatus;
use App\Models\Data\Order;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Models\Utils\PriceConfig;
use Illuminate\Support\Facades\DB;

class OrderAction {
    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handle(Request $request)
    {
        DB::transaction(function () use ($request) {
            $guide = User::findByUuid(guide()->uuid);
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
                case 'guide_show_merchant':
                    $type = OrderType::Guide_Show_Merchant;
                    break;
            }

            $data = [
                'benefit_value' => $package->benefit_value,
                'benefit_type' => $package->benefit_type,
                'price' => $price,
                'status' => OrderStatus::Waiting_Payment,
                'type' => $type,
                'expired_at' => Carbon::now()->addDays($package->benefit_value),
                'user_id' => $guide->id,
                'user_role' => 'guest'
            ];

            Order::create($data);
        });
    }
}
