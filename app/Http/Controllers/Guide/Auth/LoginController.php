<?php

namespace App\Http\Controllers\Guide\Auth;

use App\Actions\Guide\Auth\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guide\Auth\LoginRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Guide/Auth/Login');
    }

    public function store(LoginRequest $request, LoginAction $loginAction)
    {
        $loginAction->handle($request);
        return to_route("guide.home");
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        $request->session()->forget(config("services.session-guide-prefix"));

        return to_route('guide.login');
    }
}
