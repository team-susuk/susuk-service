<?php

namespace App\Http\Controllers\Guide\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Guide/Auth/Login');
    }
}
