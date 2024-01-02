<?php
namespace App\Services\Utils;

use Illuminate\Http\Request;
use App\Enums\CategoryMerchant;
use App\Models\Data\FeaturedMerchant;
use Laililmahfud\Adminportal\Services\AdminService;

class NewMerchantsService extends AdminService
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
            ->where('featured_merchants.category', CategoryMerchant::New_Merchant)
            ->select([
                'featured_merchants.*',
                'merchants.name as username',
                'merchants.address',
                'merchants.profile',
                'merchants.commission',
                'orders.price as harga_iklan',
                'orders.benefit_type',
                'orders.benefit_value'
            ])
            ->datatable($perPage, "featured_merchants.created_at");

    }
}
