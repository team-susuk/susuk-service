<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Enums\NotificationType;
use App\Http\Controllers\Controller;
use App\Services\Notification\NotificationService;
use App\Http\Resources\Notification\NotificationResource;

class InboxController extends Controller
{
    public function __construct(
        private NotificationService $notificationService
    ) {
    }

    public function index()
    {
        return Inertia::render("Merchant/Inbox/Index");
    }

    public function indexData()
    {
        return NotificationResource::collection(
            $this->notificationService->getNotifications(NotificationType::Information, merchant()->id, 'merchant')
        );
    }
}
