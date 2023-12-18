<?php

namespace App\Http\Resources\User;

use App\Helpers\Susuk;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'profile' => $this->profile,
            'profile_url' => Susuk::showFile($this->profile),
            'description' => $this->description,
            'category_id' => $this->category_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'subdistrict_id' => $this->subdistrict_id,
            'address' => $this->address,
            'full_address' => $this->full_address,
            'pic_name' => $this->pic_name,
            'phone_number' => $this->phone_number,
            'whatsapp_number' => $this->whatsapp_number,
            'commission' => $this->commission,
            'full_commission' => $this->full_commission,
            'weekdays' => $this->weekdays,
            'weekday_time' => $this->weekday_time,
            'weekends' => $this->weekends,
            'weekend_time' => $this->weekend_time,
            'siup_document' => $this->siup_document,
            'viewer' => $this->viewer,
            'is_member' => $this->is_member,
            'expired_member_at' => $this->expired_member_at,
            'password' => $this->password,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'code' => $this->code,
            'register_at' => $this->register_at,
            'verification_at' => $this->verification_at,
            'status' => $this->status
        ];
    }
}
