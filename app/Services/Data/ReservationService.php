<?php

namespace App\Services\Data;

use App\Enums\GuestType;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use App\Models\Data\Reservation;
use Illuminate\Validation\ValidationException;

class ReservationService {
    public function __construct(
        public $model = Reservation::class,
    ) {
    }

    public function getHistories($type, $userId)
    {
        $userId = User::whereUuid($userId)->first();

        return $this->model::where(
            function($q) use ($type, $userId) {
                if ($type == "guide") {
                    $q->where("user_id", $userId);
                } else {
                    $q->where("merchant_id", $userId);
                }
            }
        )->whereNotNull("scan_by")->orderByDesc("created_at")->paginate();
    }

    public function addReservation(Request $request, $id, $userId)
    {
        $merchant = Merchant::findByUUid($id);
        $user = User::findByUuid($userId);
        $timeArrival = "{$request->arrival_date} {$request->arrival_time}:00";

        $checkReservation = $this->model::where("user_id", $user->id)->where("merchant_id", $merchant->id)->where("time_arrival", $timeArrival)->first();

        if ($checkReservation) {
            throw new \Exception("Anda sudah melakukan reservasi di tanggal dan jam yang sama");
            
        }

        $this->model::create([
            'merchant_id' => $merchant->id,
            'user_id' => $user->id,
            'guest_number' => $request->total_guest,
            'guest_type' => $request->type == 'lokal' ? GuestType::Domestic : GuestType::Foreign,
            'time_arrival' => $timeArrival
        ]);
    }
}