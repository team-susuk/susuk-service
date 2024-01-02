<?php
namespace App\Services\Utils;

use App\Enums\CategoryProduct;
use Illuminate\Http\Request;
use App\Models\Data\FeaturedProduct;
use Laililmahfud\Adminportal\Services\AdminService;

class SpecialProductsService extends AdminService
{
    public function __construct(
        public $model = FeaturedProduct::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::query()
            ->join('merchants', 'merchants.id', 'featured_products.merchant_id')
            ->join('products', 'products.id', 'featured_products.product_id')
            ->join('orders', 'orders.id', 'featured_products.order_id')
            ->where(function ($q) use ($search) {
                $q->orWhere("merchants.name", "like", "%" . $search . "%");
                $q->orWhere("merchants.address", "like", "%" . $search . "%");
            })
            ->where('featured_products.category', CategoryProduct::Special_This_Month)
            ->select([
                'featured_products.*',
                'merchants.name as username',
                'merchants.address',
                'merchants.profile',
                'merchants.commission',
                'products.name as product_name',
                'products.image as product_image',
                'orders.price as harga_iklan',
                'orders.benefit_type',
                'orders.benefit_value'
            ])
            ->datatable($perPage, "featured_products.created_at");
    }
}
