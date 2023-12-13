<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Language;
use App\Services\Master\LanguageService;

class MemberController extends Controller
{
    public function __construct(
        private LanguageService $languageService
    ) {
    }

    public function index()
    {
        return Inertia::render("Merchant/Member/Index", [
            "languages" => $this->languageService->getLangs()
        ]);
    }
}
