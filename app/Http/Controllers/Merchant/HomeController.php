<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use App\Http\Controllers\Controller;
use App\Services\Data\ProductService;
use App\Services\Master\CategoryService;
use App\Actions\Merchant\Profile\EditAction;
use App\Http\Requests\Merchant\Profile\ProfileRequest;
use App\Services\Master\LanguageService;
use App\Services\Regions\ProvinceService;
use App\Services\Utils\PriceConfigService;

class HomeController extends Controller
{
    public function __construct(
        private ProductService $productService,
        private CategoryService $categoryService,
        private PriceConfigService $priceConfigService,
        private ProvinceService $provinceService,
        private LanguageService $languageService
    ){}

    public function index()
    {
        return Inertia::render('Merchant/Home/Index', [
            'merchant' => Merchant::findByUuid(merchant()->uuid),
            'products' => $this->productService->getMerchantProducts(merchant()->uuid),
            'packages' => $this->priceConfigService->getPackageMerchant(),
            'regions' => $this->provinceService->getProvinces(),
            "languages" => $this->languageService->getLangs(),
        ]);
    }

    public function edit()
    {
        return Inertia::render('Merchant/Home/EditMerchant', [
            'categories' => $this->categoryService->get(),
        ]);
    }

    public function editStore(ProfileRequest $profileRequest, EditAction $editAction)
    {
        $verificationToken = $editAction->handle($profileRequest);
        return to_route('merchant.home')->with([
            'popup_success' => 'Data Toko Berhasil Diubah'
        ]);
    }
}
