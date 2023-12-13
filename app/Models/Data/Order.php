<?php

namespace App\Models\Data;

use App\Enums\OrderType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;

class Order extends Model
{
    use HasFactory, HasUuid;

    protected $casts = [
        'type' => OrderType::class
    ];

    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        return Susuk::showFile($this->image);
    }
}
