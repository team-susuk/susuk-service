<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Data\ReservationResource;
use App\Services\Data\ReservationService;

class QrCodeController extends Controller
{

    public function __construct(
        private ReservationService $reservationService
    ){}

    public function index()
    {
        return Inertia::render('Guide/QrCode/Index');
    }

    public function histories()
    {
        return Inertia::render('Guide/QrCode/History');
    }

    public function historiesData()
    {
        return ReservationResource::collection(
            $this->reservationService->getHistories("guide", guide()->uuid)
        );
    }
}
