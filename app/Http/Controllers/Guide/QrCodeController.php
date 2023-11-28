<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QrCodeController extends Controller
{
    public function index()
    {
        return Inertia::render('Guide/QrCode/Index');
    }

    public function histories()
    {
        return Inertia::render('Guide/QrCode/History');
    }
}
