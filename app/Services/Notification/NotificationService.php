<?php

namespace App\Services\Notification;

use App\Models\User\User;
use App\Models\Notification\Notification;

class NotificationService {
    public function __construct(
        public $model = Notification::class,
    ) {
    }

    public function getNotifications($type, $userId)
    {
        $user = User::findByUuid($userId);

        return $this->model::where("user_id", $user->id)
        ->where("type", $type)
        ->orderByDesc("created_at")
        ->paginate();
    }
}