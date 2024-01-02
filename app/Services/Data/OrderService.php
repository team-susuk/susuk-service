<?php

namespace App\Services\Data;

use Carbon\Carbon;
use App\Enums\OrderType;
use App\Enums\OrderStatus;
use App\Models\Data\Order;
use App\Models\Data\Product;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
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
            ->where('orders.user_role','merchant')
            ->where(function ($q) use ($search) {
                $q->orWhere("orders.user_role", "like", "%" . $search . "%");
                $q->orWhere("orders.type", "like", "%" . $search . "%");
                $q->orWhere("orders.status", "like", "%" . $search . "%");
            })
            ->select('orders.*',  'merchants.name as user_name');
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
            ->whereDate("expired_at", ">=", Carbon::now())->inRandomOrder()->get();
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
        if ($currentProduct >= config('services.max-products')) $count = $this->model::where("user_id", $merchantUuid)->where("type", OrderType::Add_Product)->where("status", OrderStatus::Paid)->count();
        return config('services.max-products') + $count;
    }

    public function checkMaximumProducts($merchantUuid)
    {
        $getMaximumProducts = $this->getMaximumProducts($merchantUuid);
        $product = Product::where("merchant_id", $merchantUuid)->count();
        if ($product >= $getMaximumProducts) {
            return false;
        }

        return true;
    }
}