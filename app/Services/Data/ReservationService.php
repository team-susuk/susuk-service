<?php

namespace App\Services\Data;

use Carbon\Carbon;
use App\Enums\GuestType;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use App\Models\Data\Reservation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class ReservationService
{
    public function __construct(
        public $model = Reservation::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        $query = $this->model::with(['merchant:id,name', 'user:id,name'])
            ->where(function ($q) use ($search) {
                $q->orWhere("user_id", "like", "%" . $search . "%");
                $q->orWhere("merchant_id", "like", "%" . $search . "%");
                $q->orWhere("time_arrival", "like", "%" . $search . "%");
                $q->orWhere("guest_number", "like", "%" . $search . "%");
                $q->orWhere("guest_type", "like", "%" . $search . "%");
                $q->orWhere("scan_by", "like", "%" . $search . "%");
                ;
            });
        if ($perPage) {
            return $query->datatable($perPage, "created_at");
        } else {
            return $query->get();
        }
    }


    public function getHistories($role, $userId, $type)
    {
        return $this->model::where(
            function ($q) use ($role, $userId, $type) {
                if ($role == "guide") {
                    $q->where("user_id", $userId);
                } else {
                    $q->where("merchant_id", $userId);
                }

                if ($type == 'scanned') {
                    $q->whereNotNull("confirm_at");
                }
            }
        )->orderByDesc("created_at")->paginate();
    }

    public function addReservation(Request $request, $id, $userId)
    {
        $timeArrival = "{$request->arrival_date} {$request->arrival_time}:00";

        $checkReservation = $this->model::where("user_id", $userId)->where("merchant_id", $id)->where("time_arrival", $timeArrival)->first();

        if ($checkReservation) {
            throw new \Exception("Anda sudah melakukan reservasi di tanggal dan jam yang sama");

        }

        $this->model::create([
            'merchant_id' => $id,
            'user_id' => $userId,
            'guest_number' => $request->total_guest,
            'guest_type' => $request->type == 'lokal' ? GuestType::Domestic : GuestType::Foreign,
            'time_arrival' => $timeArrival,
            'scan_by' => 'guest'
        ]);
    }

    public function updateReservation(Request $request, $id)
    {
        $timeArrival = "{$request->arrival_date} {$request->arrival_time}:00";

        if ($request->id) {
            $this->model::where('id', $request->id)->where('merchant_id', merchant()->id)->update([
                'guest_number' => $request->total_guest,
                'guest_type' => $request->type == 'lokal' ? GuestType::Domestic : GuestType::Foreign,
                'scan_by' => 'merchant',
                'confirm_at' => Carbon::now()
            ]);
        } else {
            $this->model::create([
                'merchant_id' => $id,
                'user_id' => $id,
                'guest_number' => $request->total_guest,
                'guest_type' => $request->type == 'lokal' ? GuestType::Domestic : GuestType::Foreign,
                'time_arrival' => $timeArrival,
                'scan_by' => 'merchant',
                'confirm_at' => Carbon::now()
            ]);
        }
    }

    public function checkQrCode($token)
    {
        $check = Crypt::decrypt($token);
        if ($check->code && $check->source && $check->source == 'susuk-guide') {
            $user = User::whereCode($check->code)->first();
            $reservation = $this->model::where("merchant_id", merchant()->id)->where("user_id", $user->id)->whereNull("confirm_at")->orderByDesc("created_at")->first();
            if ($reservation) {
                $reservation->date = Carbon::parse($reservation->time_arrival)->format("d M Y");
                $reservation->time = Carbon::parse($reservation->time_arrival)->format("H:i");
                $reservation->type = $reservation->guest_type == GuestType::Domestic ? 'lokal' : 'asing';

                return $reservation;
            } else {
                return (object)[
                    'user_id' => $user->id
                ];
                // throw new \Exception("Tidak Ada Reservasi yang Ditemukan");
            }
        } else {
            throw new \Exception("Qr Code Tidak Valid");
        }
    }
}