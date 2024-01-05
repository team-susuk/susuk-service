<?php

namespace App\Services\Notification;

use App\Enums\NotificationType;
use Carbon\Carbon;
use App\Models\User\User;
use App\Models\User\Merchant;
use App\Models\Notification\Notification;

class NotificationService {
    public function __construct(
        public $model = Notification::class,
    ) {
    }

    public function getNotifications($type, $userId, $userRole = 'guest', $isAdmin = false)
    {
        return $this->model::where("user_id", $userId)
        ->where("role", $userRole)
        ->where("type", $type)
        ->where(function ($q) use ($type, $userRole, $isAdmin) {
            if ($type == NotificationType::Blast) {
                $q->orWhere("expired_at", ">=", Carbon::now());
            }
            if ($userRole == 'merchant') {
                if ($isAdmin) {
                    $q->whereNotNull("broadcast_id");
                } else {
                    $q->whereNull("broadcast_id");
                }
            }
        })
        ->orderByDesc("id")
        ->paginate();
    }

    public function getDetail($userId, $id)
    {
        $data = $this->model::where("user_id", $userId)->where("uuid", $id)->firstOrFail();
        $data->time = Carbon::parse($data->created_at)->format("d M Y H.i");

        return $data;
    }
}