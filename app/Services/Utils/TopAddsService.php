<?php
namespace App\Services\Utils;

use App\Enums\OrderType;
use App\Models\Data\Order;
use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Services\AdminService;

class TopAddsService extends AdminService
{
    public function __construct(
        public $model = Order::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::query()
            ->join('merchants','merchants.id','orders.user_id')
            ->where(function ($q) use ($search) {
                $q->orWhere("merchants.name", "like", "%" . $search . "%");
                $q->orWhere("merchants.address", "like", "%" . $search . "%");
            })
            ->whereIn('orders.type', [OrderType::Merchant_Top_Ads, OrderType::Product_Top_Ads])
            ->select(['orders.*','merchants.name as username','merchants.address','merchants.profile'])
            ->datatable($perPage, "orders.created_at");

    }

}
