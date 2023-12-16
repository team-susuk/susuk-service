<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use App\Http\Controllers\Controller;
use App\Services\Data\ProductService;

class HomeController extends Controller
{
    public function __construct(
        private ProductService $productService
    ){}

    public function index()
    {
        return Inertia::render('Merchant/Home/Index', [
            'merchant' => Merchant::findByUuid(merchant()->uuid),
            'products' => $this->productService->getMerchantProducts(merchant()->uuid)
        ]);
    }
}
