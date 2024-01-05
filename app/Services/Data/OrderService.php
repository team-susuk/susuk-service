<?php

namespace App\Services\Data;

use Carbon\Carbon;
use App\Enums\OrderType;
use App\Enums\OrderStatus;
use App\Models\Data\Order;
use App\Models\Data\Product;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use Illuminate\Support\Facades\DB;
use Laililmahfud\Adminportal\Services\AdminService;

class OrderService extends AdminService
{
    public function __construct(
        public $model = Order::class,
    ) {
    }

    public function datatable(Request $request, $perPage = null)
    {
        $search = $request->search ?? '';

        $query = $this->model::query()
            ->join('merchants', 'merchants.id', 'orders.user_id')
            ->leftJoin('products', 'products.id', DB::Raw("CAST(orders.data->'$.product_id' AS UNSIGNED)"))
            ->leftJoin('provinces', 'provinces.id', DB::Raw("CAST(orders.data->'$.province_id' AS UNSIGNED)"))
            ->leftJoin('cities', 'cities.id', DB::Raw("CAST(orders.data->'$.city_id' AS UNSIGNED)"))
            ->leftJoin('professions', 'professions.id', DB::Raw("CAST(orders.data->'$.profession_id' AS UNSIGNED)"))
            ->where('orders.user_role', 'merchant')
            ->where(function ($q) use ($search) {
                $q->orWhere("orders.user_role", "like", "%" . $search . "%");
                $q->orWhere("orders.type", "like", "%" . $search . "%");
                $q->orWhere("orders.status", "like", "%" . $search . "%");
            })
            ->select([
                'orders.*',
                'merchants.name as user_name',
                'products.name as product_name',
                'products.image as product_image',
                'products.price as product_price',
                'products.commission as product_commission',
                'provinces.name as province_name',
                'cities.name as city_name',
                'professions.name as profession_name'
            ]);
        if ($perPage) {
            return $query->datatable($perPage, "orders.created_at");
        } else {
            return $query->get();
        }

    }

    public function getAds()
    {
        return $this->model::
            whereIn("type", [OrderType::Merchant_Top_Ads])
            ->where("status", OrderStatus::Paid)
            ->whereDate("expired_at", ">=", Carbon::now())->inRandomOrder()->limit(1)->get();
    }

    public function getMerchantHistories($merchantUuid)
    {
        return $this->model::where("user_id", $merchantUuid)
            ->orderByDesc("created_at")
            ->paginate();
    }

    public function getMaximumProducts($merchantUuid, $currentProduct = 9)
    {
        $count = 0;
        // if ($currentProduct >= config('services.max-products'))
            $count = $this->model::where("user_id", $merchantUuid)->where("type", OrderType::Add_Product)->where("status", OrderStatus::Paid)->sum("benefit_value");
        return config('services.max-products') + $count;
    }

    public function checkMaximumProducts($merchantUuid)
    {
        $product = Product::where("merchant_id", $merchantUuid)->count();
        $getMaximumProducts = $this->getMaximumProducts($merchantUuid, $product);
        if ($product > $getMaximumProducts) {
            return false;
        }

        return true;
    }
}