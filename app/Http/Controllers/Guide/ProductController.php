<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use App\Helpers\Susuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function category($category)
    {
        return Inertia::render('Guide/Product/Category', [
            'title' => Susuk::slugToNormal($category)
        ]);
    }
}
