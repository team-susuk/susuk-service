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

class OrderService extends AdminService {
    public function __construct(
        public $model = Order::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';
        
        return $this->model::where(function ($q) use ($search) {
                $q->orWhere("user_id", "like", "%" . $search . "%");
                $q->orWhere("user_role", "like", "%" . $search . "%");
                $q->orWhere("type", "like", "%" . $search . "%");
                $q->orWhere("image", "like", "%" . $search . "%");
                $q->orWhere("benefit_value", "like", "%" . $search . "%");
                $q->orWhere("benefit_type", "like", "%" . $search . "%");
                $q->orWhere("price", "like", "%" . $search . "%");
                $q->orWhere("status", "like", "%" . $search . "%");
                $q->orWhere("expired_at", "like", "%" . $search . "%");
                $q->orWhere("pay_at", "like", "%" . $search . "%");
                $q->orWhere("data", "like", "%" . $search . "%");;
            })
            ->select("*")
            ->datatable($perPage, "orders.created_at");

    }
    
    public function getAds()
    {
        return $this->model::
            where("type", OrderType::Ads_Banner)
            ->whereDate("expired_at", "<=", Carbon::now()->endOfDay())->inRandomOrder()->get();
    }

    public function getMerchantHistories($merchantUuid)
    {
        $merchant = Merchant::findByUuid($merchantUuid);

        return $this->model::where("user_id", $merchant->id)
        ->orderByDesc("created_at")
        ->paginate();
    }

    public function getMaximumProducts($merchantUuid)
    {
        $merchant = Merchant::findByUuid($merchantUuid);
        return 9 + $this->model::where("user_id", $merchant->id)->where("type", OrderType::Add_Product)->where("status", OrderStatus::Paid)->count();
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