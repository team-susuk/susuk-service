<?php

namespace App\Models\Data;

use App\Enums\CategoryProduct;
use App\Models\User\Merchant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laililmahfud\Adminportal\Traits\HasUuid;

class FeaturedProduct extends Model
{
    use HasFactory, HasUuid;

    protected $casts = [
        'category' => CategoryProduct::class
    ];

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
