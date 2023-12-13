<?php

namespace App\Http\Controllers\Guide\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Master\Language;
use App\Models\Master\Profession;
use App\Http\Controllers\Controller;
use App\Actions\Guide\Auth\RegisterAction;
use App\Http\Requests\Guide\Auth\RegisterRequest;
use App\Services\Master\LanguageService;

class RegisterController extends Controller
{
    public function __construct(
        private LanguageService $languageService
    ) {
    }

    public function index()
    {
        return Inertia::render('Guide/Auth/Register', [
            "languages" => $this->languageService->getLangs(),
            "professions" => Profession::get()
        ]);
    }

    public function store(RegisterRequest $request, RegisterAction $register)
    {
        $verificationToken = $register->handle($request);
        return redirect()->back();
    }
}
