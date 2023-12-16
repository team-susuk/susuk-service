<?php

namespace App\Services\Notification;

use App\Models\User\User;
use App\Models\Notification\Notification;
use App\Models\User\Merchant;

class NotificationService {
    public function __construct(
        public $model = Notification::class,
    ) {
    }

    public function getNotifications($type, $userId, $userRole = 'guest')
    {
        if ($userRole == 'guest') {
            $user = User::findByUuid($userId);
        } else {
            $user = Merchant::findByUuid($userId);
        }

        return $this->model::where("user_id", $user->id)
        ->where("type", $type)
        ->orderByDesc("created_at")
        ->paginate();
    }
}