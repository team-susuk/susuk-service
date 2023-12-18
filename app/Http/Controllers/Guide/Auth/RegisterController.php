<?php

namespace App\Http\Controllers\Guide\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Master\Language;
use App\Models\Master\Profession;
use App\Http\Controllers\Controller;
use App\Services\Master\LanguageService;
use App\Services\Regions\ProvinceService;
use App\Actions\Guide\Auth\RegisterAction;
use App\Http\Requests\Guide\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function __construct(
        private LanguageService $languageService,
        private ProvinceService $provinceService,
    ) {
    }

    public function index()
    {
        return Inertia::render('Guide/Auth/Register', [
            "languages" => $this->languageService->getLangs(),
            "professions" => Profession::get(),
            'regions' => $this->provinceService->getProvinces()
        ]);
    }

    public function store(RegisterRequest $request, RegisterAction $register)
    {
        $verificationToken = $register->handle($request);
        return redirect()->back();
    }
}
