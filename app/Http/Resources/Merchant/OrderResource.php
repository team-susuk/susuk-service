<?php

namespace App\Http\Resources\Merchant;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'created_at' => Carbon::parse($this->created_at)->format("d M Y H:i"),
            'expired_at' => Carbon::parse($this->expired_at)->format("d M Y"),
            'price' => 'Rp'.number_format($this->price, 0, ',', '.'),
            'type' => $this->type?->label(),
            'status' => $this->status,
            'status_formated' => $this->status?->label(),
        ];
    }
}
