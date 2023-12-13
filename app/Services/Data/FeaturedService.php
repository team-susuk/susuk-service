<?php

namespace App\Services\Data;

use App\Models\Data\FeaturedMerchant;
use App\Models\Data\FeaturedProduct;

class FeaturedService {
    public function __construct(
        public $merchant = FeaturedMerchant::class,
        public $product = FeaturedProduct::class,
    ) {
    }

    public function getProductList($type, $limit = 0)
    {
        $data = $this->product::join('products', 'featured_products.product_id', '=', 'products.id')
        ->select('products.*')
        ->where("category", $type)->whereDate("start_at", ">=", now())->whereDate("expired_at", "<=", now());

        if ($limit == 0) {
            return $data->get();
        } else {
            return $data->limit($limit)->get();
        }
    }

    public function getMerchantList($type, $limit = 0)
    {
        $data = $this->merchant::join('merchants', 'featured_merchants.merchant_id', '=', 'merchants.id')
        ->select('merchants.*')
        ->where("category", $type)->whereDate("start_at", ">=", now())->whereDate("expired_at", "<=", now());

        if ($limit == 0) {
            return $data->get();
        } else {
            return $data->limit($limit)->get();
        }
    }
}