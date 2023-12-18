<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Master\Language;
use App\Http\Controllers\Controller;
use App\Http\Resources\Merchant\MemberResource;
use App\Services\Master\LanguageService;
use App\Services\Regions\ProvinceService;
use App\Services\Users\UserService;

class MemberController extends Controller
{
    public function __construct(
        private LanguageService $languageService,
        private ProvinceService $provinceService,
        private UserService $userService
    ) {
    }

    public function index()
    {
        return Inertia::render("Merchant/Member/Index", [
            "languages" => $this->languageService->getLangs(),
            'regions' => $this->provinceService->getProvinces(),
            'users' => $this->userService->getCountUsers()
        ]);
    }

    public function indexData()
    {
        return MemberResource::collection(
            $this->userService->getListMembers(
                request()->get('filter', [])
            )
        );
    }
}
