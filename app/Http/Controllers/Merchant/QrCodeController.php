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
            $this->reservationService->getHistories("merchant", merchant()->id, 'scanned')
        );
    }

    public function checkQr($checkQrCode)
    {
        try {
            $reservation = $this->reservationService->checkQrCode($checkQrCode);
            return redirect()->back()->with(['pass_data' => $reservation]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(["error" => $th->getMessage()]);
        }
    }

    public function reservation(Request $request, $id)
    {
        $this->reservationService->updateReservation($request, $id);

        return redirect()->back()->with(["popup_success" => "Data Kedatangan Berhasil Disimpan"]);
    }
}
