<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantController extends Controller
{
    public function index()
    {
        return Inertia::render('Guide/Merchant/Index');
    }

    public function detail($id)
    {
        return Inertia::render('Guide/Merchant/Detail');
    }
}
