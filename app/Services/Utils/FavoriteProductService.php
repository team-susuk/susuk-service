<?php
namespace App\Services\Utils;

use Illuminate\Http\Request;
use App\Enums\CategoryProduct;
use App\Models\Data\FeaturedProduct;
use Laililmahfud\Adminportal\Services\AdminService;

class FavoriteProductService extends AdminService
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
            ->where(function ($q) use ($search) {
                $q->orWhere("merchants.name", "like", "%" . $search . "%");
                $q->orWhere("merchants.address", "like", "%" . $search . "%");
            })
            ->where('featured_products.category', CategoryProduct::Favorite_Product)
            ->select([
                'featured_products.*',
                'merchants.name as username',
                'merchants.address',
                'merchants.profile',
                'merchants.commission',
                'products.name as product_name',
                'products.image as product_image'
            ])
            ->datatable($perPage, "featured_products.created_at");
    }
}
