<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use App\Helpers\Susuk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Data\ProductResource;
use App\Services\Data\FeaturedService;

class ProductController extends Controller
{
    public function __construct(
        private FeaturedService $featuredService
    ) {
    }

    public function category($category)
    {
        return Inertia::render('Guide/Product/Category', [
            'title' => Susuk::slugToNormal($category),
            'id' => $category
        ]);
    }

    public function categoryData($category)
    {
        $category = Str::replace("-", "_", $category);
        $data = $this->featuredService->getProductList($category);

        return ProductResource::collection($data);
    }
}
