<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    public function merchant()
    {
        return Inertia::render('Guide/Inbox/Merchant');
    }

    public function admin()
    {
        return Inertia::render('Guide/Inbox/Admin');
    }
}
