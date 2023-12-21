<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Master\Language;
use App\Models\Master\Profession;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePasswordRequest;
use App\Services\Master\LanguageService;
use App\Services\Regions\ProvinceService;
use App\Services\Users\UserService;

class ProfileController extends Controller
{
    public function __construct(
        private LanguageService $languageService,
        private UserService $userService,
        private ProvinceService $provinceService
    ) {
    }

    public function index()
    {
        return Inertia::render("Guide/Profile/Index");
    }

    public function detail()
    {
        return Inertia::render("Guide/Profile/Detail");
    }

    public function edit()
    {
        return Inertia::render("Guide/Profile/Edit", [
            "languages" => $this->languageService->getLangs(),
            "professions" => Profession::get(),
            'regions' => $this->provinceService->getProvinces()
        ]);
    }

    public function editPost(Request $request)
    {
        $this->userService->updateProfile($request, guide()->uuid);

        return back()->with(["popup_success" => "Profile Berhasil di Ubah"]);
    }

    public function changePassword(ChangePasswordRequest $changePasswordRequest)
    {
        $this->userService->updatePassword($changePasswordRequest, guide()->uuid);

        return back()->with(["popup_success" => "Password Berhasil di Ubah"]);
    }
}
