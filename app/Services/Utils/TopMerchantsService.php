<?php
namespace App\Services\Utils;

use App\Enums\CategoryMerchant;
use Illuminate\Http\Request;
use App\Models\Data\FeaturedMerchant;
use Laililmahfud\Adminportal\Services\AdminService;

class TopMerchantsService extends AdminService
{
    public function __construct(
        public $model = FeaturedMerchant::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::query()
            ->join('merchants', 'merchants.id', 'featured_merchants.merchant_id')
            ->join('orders', 'orders.id', 'featured_merchants.order_id')
            ->where(function ($q) use ($search) {
                $q->orWhere("merchants.name", "like", "%" . $search . "%");
                $q->orWhere("merchants.address", "like", "%" . $search . "%");
            })
            ->where('featured_merchants.category', CategoryMerchant::Top_Merchant)
            ->select([
                'featured_merchants.*',
                'merchants.name as username',
                'merchants.address',
                'merchants.profile',
                'merchants.commission',
                'orders.price as harga_iklan'
            ])
            ->datatable($perPage, "featured_merchants.created_at");

    }
}
