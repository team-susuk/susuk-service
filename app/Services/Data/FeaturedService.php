<?php

namespace App\Services\Data;

use Carbon\Carbon;
use App\Models\Data\FeaturedProduct;
use App\Models\Data\FeaturedMerchant;
use App\Models\Data\Product;
use App\Models\User\Merchant;

class FeaturedService {
    public function __construct(
        public $merchant = Merchant::class,
        public $product = Product::class,
    ) {
    }

    public function getProductList($type, $limit = 0)
    {
        $data = $this->product::join("featured_products", "featured_products.product_id", "=", "products.id")
        ->where("featured_products.category", $type)->whereDate("featured_products.start_at", "<=", Carbon::now())->whereDate("featured_products.expired_at", ">=", Carbon::now());

        if ($limit == 0) {
            return $data->get();
        } else {
            return $data->limit($limit)->get();
        }
    }

    public function getMerchantList($type, $limit = 0)
    {
        $data = $this->merchant::join("featured_merchants", "featured_merchants.merchant_id", "=", "merchants.id")
        ->where("merchants.status", "active")
        ->where("featured_merchants.category", $type)->whereDate("featured_merchants.start_at", "<=", Carbon::now())->whereDate("featured_merchants.expired_at", ">=", Carbon::now());

        if ($limit == 0) {
            return $data->get();
        } else {
            return $data->limit($limit)->get();
        }
    }
}