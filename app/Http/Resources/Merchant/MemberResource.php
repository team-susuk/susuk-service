<?php

namespace App\Http\Resources\Merchant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "uuid" => $this->uuid,
            "name" => $this->name,
            "nick_name" => $this->nick_name,
            "profession" => $this->profession?->name,
            "province" => $this->province?->name,
            "city" => $this->city?->name,
            "languages" => implode(", ", $this->languages)
        ];
    }
}
