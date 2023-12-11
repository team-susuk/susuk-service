<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QrCodeController extends Controller
{
    public function index()
    {
        return Inertia::render('Merchant/QrCode/Index');
    }

    public function histories()
    {
        return Inertia::render('Merchant/QrCode/History');
    }
}
