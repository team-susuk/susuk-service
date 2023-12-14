<?php

namespace App\Http\Resources\Notification;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "role" => $this->role,
            "type" => $this->type,
            "title" => $this->title,
            "description" => $this->description,
            "data" => $this->data,
            "broadcast" => $this->broadcast,
            "time" => Carbon::parse($this->created_at)->format("H:i")
        ];
    }
}
