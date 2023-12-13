<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use App\Models\Utils\Banner;
use Illuminate\Http\Request;
use App\Enums\CategoryProduct;
use App\Enums\CategoryMerchant;
use App\Models\Master\Category;
use App\Http\Controllers\Controller;
use App\Services\Data\FeaturedService;
use App\Services\Data\OrderService;
use App\Services\Users\MerchantService;
use App\Services\Utils\BannerService;

class HomeController extends Controller
{
    public function __construct(
        private FeaturedService $featuredService,
        private MerchantService $merchantService,
        private BannerService $bannerService,
        private OrderService $orderService
    ) {
    }

    public function index()
    {
        return Inertia::render('Guide/Home/Index', [
            'banners' => $this->bannerService->getBanners(),
            'categories' => Category::get(),
            'top_merchants' => $this->featuredService->getMerchantList(CategoryMerchant::Top_Merchant, 6),
            'new_merchants' => $this->featuredService->getMerchantList(CategoryMerchant::New_Merchant, 6),
            'favorite_products' => $this->featuredService->getProductList(CategoryProduct::Favorite_Product, 6),
            'special_products' => $this->featuredService->getProductList(CategoryProduct::Special_This_Month, 6),
            'top_advertisements' => $this->orderService->getAds()
        ]);
    }

    public function merchantCategories($category) {
        return response()->json([
            'merchants' => $this->merchantService->getByCategory($category, 6),
        ], 200);
    }
}
