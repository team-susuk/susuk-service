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
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->leftJoin('merchants', 'merchants.id', 'orders.user_id')
            ->where(function ($q) use ($search) {
                $q->orWhere("orders.user_role", "like", "%" . $search . "%");
                $q->orWhere("orders.type", "like", "%" . $search . "%");
                $q->orWhere("orders.status", "like", "%" . $search . "%");
            })
            ->select('orders.*', 'users.name as guest_name', 'merchants.name as merchant_name');
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
            ->whereDate("expired_at", "<=", Carbon::now())->inRandomOrder()->get();
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