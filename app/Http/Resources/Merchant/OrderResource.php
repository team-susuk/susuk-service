<?php

namespace App\Http\Resources\Merchant;

use Carbon\Carbon;
use App\Models\Data\Product;
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
        $image = $this->image_url;
        if ($this->data != null && isset($this->data['product_id'])) {
            $product = Product::where("id", $this->data['product_id'])->first();
            if ($product) $image = $product->image_url;
        }
        return [
            'created_at' => Carbon::parse($this->created_at)->format("d M Y H:i"),
            'expired_at' => Carbon::parse($this->expired_at)->format("d M Y"),
            'price' => 'Rp'.number_format($this->price, 0, ',', '.'),
            'type' => $this->type?->label(),
            'benefit_formated' => $this->benefit_formated,
            'benefit_type' => $this->benefit_type,
            'status' => $this->status,
            'image_url' => $image,
            'status_formated' => $this->status?->label(),
        ];
    }
}
