<?php

namespace App\Http\Controllers\Guide;

use App\Helpers\Susuk;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\MerchantResource;
use App\Services\Data\FeaturedService;
use App\Services\Data\ReservationService;
use App\Services\Master\CategoryService;
use App\Services\Regions\ProvinceService;
use App\Services\Users\MerchantService;

class MerchantController extends Controller
{
    public function __construct(
        private CategoryService $categoryService,
        private FeaturedService $featuredService,
        private MerchantService $merchantService,
        private ProvinceService $provinceService,
        private ReservationService $reservationService
    ) {
    }

    public function index()
    {
        return Inertia::render('Guide/Merchant/Index', [
            'categories' => $this->categoryService->get(),
            'regions' => $this->provinceService->getProvinces()
        ]);
    }

    public function indexData()
    {
        return MerchantResource::collection(
            $this->merchantService->getLists(request()->get('filter', []))
        );
    }

    public function detail($id)
    {
        return Inertia::render('Guide/Merchant/Detail', [
            'data' => $this->merchantService->findByUUid($id)
        ]);
    }

    public function category($category)
    {
        $category = $this->categoryService->findByUUid($category);

        return Inertia::render('Guide/Merchant/Category', [
            'title' => $category->name,
            'id' => $category->uuid,
            'type' => 'category'
        ]);
    }

    public function categoryData($type, $category)
    {
        if ($type == 'category') {
            $category = $this->categoryService->findByUUid($category);
            $data = $this->merchantService->getByCategory($category->uuid);
        } else {
            $data = $this->featuredService->getMerchantList($category);
        }

        return MerchantResource::collection($data);
    }

    public function featured($featured)
    {
        return Inertia::render('Guide/Merchant/Category', [
            'title' => Susuk::slugToNormal($featured),
            'id' => $featured,
            'type' => 'featured'
        ]);
    }

    public function booking(Request $request, $id)
    {
        try {
            $this->reservationService->addReservation($request, $id, guide()->uuid);

            return back()->with(["popup_success" => "Reservasi Berhasil Dibuat"]);
        } catch (\Throwable $th) {
            return back()->with(["error" => $th->getMessage()]);
        }
    }
}
