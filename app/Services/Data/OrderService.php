<?php

namespace App\Services\Data;

use Carbon\Carbon;
use App\Enums\OrderType;
use App\Models\Data\Order;

class OrderService {
    public function __construct(
        public $model = Order::class,
    ) {
    }


    public function getAds()
    {
        return $this->model::
            where("type", OrderType::Ads_Banner)
            ->whereDate("expired_at", "<=", Carbon::now()->endOfDay())->inRandomOrder()->get();
    }
}