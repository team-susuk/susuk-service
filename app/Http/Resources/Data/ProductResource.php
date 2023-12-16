<?php

namespace App\Http\Resources\Data;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "uuid" => $this->uuid,
            "merchant_id" => $this->merchant_id,
            "name" => $this->name,
            "image" => $this->image,
            "image_url" => $this->image_url,
            "description" => $this->description,
            "price" => $this->price,
            "price_formated" => $this->price_formated,
            "commission" => $this->commission,
            "viewer" => $this->viewer,
        ];
    }
}
