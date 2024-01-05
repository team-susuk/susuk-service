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

    public function guide()
    {
        return Inertia::render("Merchant/Inbox/Guide");
    }

    public function guideData()
    {
        return NotificationResource::collection(
            $this->notificationService->getNotifications(NotificationType::Information, merchant()->id, 'merchant')
        );
    }

    public function admin()
    {
        return Inertia::render("Merchant/Inbox/Admin");
    }

    public function adminData()
    {
        return NotificationResource::collection(
            $this->notificationService->getNotifications(NotificationType::Information, merchant()->id, 'merchant', true)
        );
    }

    public function detail($id)
    {
        return Inertia::render("Merchant/Inbox/Detail", [
            "data" => $this->notificationService->getDetail(merchant()->id, $id),
            'back_url' => request()->back_url ?? url()->previous()
        ]);
    }
}
