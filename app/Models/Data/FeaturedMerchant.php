<?php

namespace App\Models\Data;

use App\Models\User\Merchant;
use App\Enums\CategoryMerchant;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laililmahfud\Adminportal\Traits\HasDatatable;

class FeaturedMerchant extends Model
{
    use HasFactory, HasUuid,HasDatatable;

    protected $guarded = [];

    protected $casts = [
        'category' => CategoryMerchant::class
    ];

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }
}
