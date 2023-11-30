<?php

namespace App\Http\Controllers\Guide;

use App\Helpers\Susuk;
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

    public function category($category)
    {
        return Inertia::render('Guide/Merchant/Category', [
            'title' => Susuk::slugToNormal($category)
        ]);
    }
}
