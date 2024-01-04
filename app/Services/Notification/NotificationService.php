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

    public function getNotifications($type, $userId, $userRole = 'guest')
    {
        return $this->model::where("user_id", $userId)
        ->where("role", $userRole)
        ->where("type", $type)
        ->where(function ($q) use ($type) {
            if ($type == NotificationType::Blast) {
                $q->orWhere("expired_at", ">=", Carbon::now());
            }
        })
        ->orderByDesc("id")
        ->paginate();
    }
}