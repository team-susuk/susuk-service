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

    public function historiesScan()
    {
        return Inertia::render('Guide/QrCode/History');
    }

    public function historiesScanData()
    {
        return ReservationResource::collection(
            $this->reservationService->getHistories("guide", guide()->id, 'scanned')
        );
    }

    public function historiesBooking()
    {
        return Inertia::render('Guide/QrCode/HistoryBooking');
    }

    public function historiesBookingData()
    {
        return ReservationResource::collection(
            $this->reservationService->getHistories("guide", guide()->id, 'all')
        );
    }
}
