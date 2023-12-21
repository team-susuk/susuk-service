<?php

namespace App\Http\Controllers\Guide;

use App\Enums\NotificationType;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notification\NotificationResource;
use App\Services\Notification\NotificationService;

class InboxController extends Controller
{
    public function __construct(
        private NotificationService $notificationService
    ) {
    }

    public function merchant()
    {
        return Inertia::render('Guide/Inbox/Merchant');
    }

    public function admin()
    {
        return Inertia::render('Guide/Inbox/Admin');
    }

    public function merchantData()
    {
        return NotificationResource::collection(
            $this->notificationService->getNotifications(NotificationType::Blast, guide()->id)
        );
    }

    public function adminData()
    {
        return NotificationResource::collection(
            $this->notificationService->getNotifications(NotificationType::Information, guide()->id)
        );
    }
}
