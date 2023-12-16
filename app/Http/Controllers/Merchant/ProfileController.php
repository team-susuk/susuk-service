<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePasswordRequest;
use App\Services\Users\MerchantService;

class ProfileController extends Controller
{
    public function __construct(
        private MerchantService $merchantService
    ) {
    }

    public function index()
    {
        return Inertia::render("Merchant/Profile/Index");
    }

    public function changePassword(ChangePasswordRequest $changePasswordRequest)
    {
        $this->merchantService->updatePassword($changePasswordRequest, guide()->uuid);

        return back()->with(["popup_success" => "Password Berhasil di Ubah"]);
    }
}
