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


    public function getHistories($type, $userId)
    {
        $userId = User::whereUuid($userId)->first();

        return $this->model::where(
            function ($q) use ($type, $userId) {
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

    public function updateReservation(Request $request, $id)
    {
        $merchant = Merchant::findByUUid(merchant()->uuid);

        $this->model::where('id', $id)->where('merchant_id', $merchant->id)->update([
            'guest_number' => $request->total_guest,
            'guest_type' => $request->type == 'lokal' ? GuestType::Domestic : GuestType::Foreign,
            'scan_by' => 'merchant'
        ]);
    }

    public function checkQrCode($token)
    {
        $check = Crypt::decrypt($token);
        if ($check->code && $check->source && $check->source == 'susuk-guide') {
            $merchant = Merchant::findByUuid(merchant()->uuid);
            $user = User::whereCode($check->code)->first();
            $reservation = $this->model::where("merchant_id", $merchant->id)->where("user_id", $user->id)->whereNull("scan_by")->orderByDesc("created_at")->first();
            if ($reservation) {
                $reservation->date = Carbon::parse($reservation->time_arrival)->format("d M Y");
                $reservation->time = Carbon::parse($reservation->time_arrival)->format("H:i");
                $reservation->type = $reservation->guest_type == GuestType::Domestic ? 'lokal' : 'asing';

                return $reservation;
            } else {
                throw new \Exception("Tidak Ada Reservasi yang Ditemukan");
            }
        } else {
            throw new \Exception("Qr Code Tidak Valid");
        }
    }
}