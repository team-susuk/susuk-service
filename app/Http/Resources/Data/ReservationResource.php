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
            "merchant" => $this->merchant,
            "time_arrival" => Carbon::parse($this->time_arrival)->format("d M Y H.i"),
            "guest_number" => $this->guest_number,
            "guest_type" => $this->guest_type == 'domestic' ? 'Lokal' : 'Asing',
            "scan_by" => $this->scan_by,
        ];
    }
}
