<?php

namespace App\Http\Controllers\Merchant\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Merchant\Auth\LoginAction;
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
}
