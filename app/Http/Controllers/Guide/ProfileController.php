<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
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
        return Inertia::render("Guide/Profile/Edit");
    }
}
