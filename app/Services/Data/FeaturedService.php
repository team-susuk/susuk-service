<?php

namespace App\Services\Data;

use Carbon\Carbon;
use App\Models\Data\FeaturedProduct;
use App\Models\Data\FeaturedMerchant;

class FeaturedService {
    public function __construct(
        public $merchant = FeaturedMerchant::class,
        public $product = FeaturedProduct::class,
    ) {
    }

    public function getProductList($type, $limit = 0)
    {
        $data = $this->product::with(["product"])->whereHas("product")
        ->where("category", $type)->whereDate("start_at", ">=", Carbon::now())->whereDate("expired_at", "<=", Carbon::now());

        if ($limit == 0) {
            return $data->get();
        } else {
            return $data->limit($limit)->get();
        }
    }

    public function getMerchantList($type, $limit = 0)
    {
        $data = $this->merchant::with(["merchant"])->whereHas("merchant")
        ->where("category", $type)->whereDate("start_at", ">=", Carbon::now())->whereDate("expired_at", "<=", Carbon::now());

        if ($limit == 0) {
            return $data->get();
        } else {
            return $data->limit($limit)->get();
        }
    }
}