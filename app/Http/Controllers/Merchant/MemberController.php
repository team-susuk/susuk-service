<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index()
    {
        return Inertia::render("Merchant/Member/Index");
    }
}
