<?php

namespace App\Services\Data;

use App\Models\User\User;
use App\Models\Data\Reservation;

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
}