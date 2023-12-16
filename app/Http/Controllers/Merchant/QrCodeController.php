<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Data\ReservationService;
use App\Http\Resources\Data\ReservationResource;

class QrCodeController extends Controller
{
    public function __construct(
        private ReservationService $reservationService
    ){}

    public function index()
    {
        return Inertia::render('Merchant/QrCode/Index');
    }

    public function histories()
    {
        return Inertia::render('Merchant/QrCode/History');
    }

    public function historiesData()
    {
        return ReservationResource::collection(
            $this->reservationService->getHistories("merchant", merchant()->uuid)
        );
    }
}
