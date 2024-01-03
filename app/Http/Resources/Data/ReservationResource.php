<?php

namespace App\Http\Resources\Data;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "user" => $this->user,
            "city" => $this->user?->city?->name,
            "province" => $this->user?->province?->name,
            "merchant" => $this->merchant,
            "time_arrival" => Carbon::parse($this->time_arrival)->format("d M Y H.i"),
            "guest_number" => $this->guest_number,
            "guest_type" => $this->guest_type == 'domestic' ? 'Lokal' : 'Asing',
            "scan_by" => $this->scan_by,
            "confirm_at" => Carbon::parse($this->confirm_at)->format("d M Y H.i"),
            "created_at" => Carbon::parse($this->created_at)->format("d M Y H.i")
        ];
    }
}
