<?php

namespace App\Http\Controllers\Merchant\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Merchant\Auth\LoginAction;
use App\Http\Requests\Merchant\Auth\ForgotRequest;
use App\Http\Requests\Merchant\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Merchant/Auth/Login');
    }

    public function store(LoginRequest $request, LoginAction $loginAction)
    {
        $loginAction->handle($request);
        return to_route("merchant.home");
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        $request->session()->forget(config("services.session-merchant-prefix"));

        return to_route('merchant.login');
    }

    public function forgotPassword(ForgotRequest $request, LoginAction $loginAction)
    {
        $loginAction->requestPassword($request);
        return redirect()->back()->with([
            'popup_success' => 'Mohon Tunggu',
            'popup_success_subtitle' => 'Admin akan segera mengirimkan password baru ke nomor wa anda'
        ]);
    }
}
