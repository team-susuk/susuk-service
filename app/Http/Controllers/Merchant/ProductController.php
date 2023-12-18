<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Regions\ProvinceService;
use App\Services\Utils\PriceConfigService;
use App\Http\Requests\Merchant\ProductRequest;
use App\Actions\Merchant\Product\ProductAction;
use App\Models\Data\Product;
use App\Services\Master\LanguageService;

class ProductController extends Controller
{
    public function __construct(
        private PriceConfigService $priceConfigService,
        private ProvinceService $provinceService,
        private LanguageService $languageService
    ){}


    public function add()
    {
        return Inertia::render("Merchant/Product/Add");
    }

    public function store(ProductRequest $productRequest, ProductAction $productAction)
    {
        $verificationToken = $productAction->handle($productRequest);
        return to_route('merchant.home')->with([
            'popup_success' => 'Produk Berhasil Ditambahkan'
        ]);
    }

    public function detail($id)
    {
        return Inertia::render("Merchant/Product/Detail", [
            'product' => Product::whereUuid($id)->firstOrFail(),
            'packages' => $this->priceConfigService->getPackageProduct(),
            'regions' => $this->provinceService->getProvinces(),
            "languages" => $this->languageService->getLangs(),
        ]);
    }

    public function edit($id)
    {
        return Inertia::render("Merchant/Product/Edit", [
            'product' => Product::whereUuid($id)->firstOrFail()
        ]);
    }

    public function update(ProductRequest $productRequest, ProductAction $productAction, $id)
    {
        $verificationToken = $productAction->handleUpdate($productRequest, $id);
        return to_route('merchant.products.detail', $id)->with([
            'popup_success' => 'Produk Berhasil Diubah'
        ]);
    }
}
