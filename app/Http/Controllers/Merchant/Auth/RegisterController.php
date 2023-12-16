<?php

namespace App\Http\Controllers\Merchant\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Master\CategoryService;
use App\Services\Regions\ProvinceService;
use App\Actions\Merchant\Auth\RegisterAction;
use App\Http\Requests\Merchant\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function __construct(
        private CategoryService $categoryService,
        private ProvinceService $provinceService,
    ) {
    }

    public function index()
    {
        return Inertia::render('Merchant/Auth/Register', [
            'categories' => $this->categoryService->get(),
            'regions' => $this->provinceService->getProvinces()
        ]);
    }

    public function store(RegisterRequest $request, RegisterAction $register)
    {
        $verificationToken = $register->handle($request);
        return redirect()->back();
    }
}
