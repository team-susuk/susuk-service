<?php

namespace App\Models\Data;

use App\Enums\OrderStatus;
use App\Helpers\Susuk;
use App\Enums\OrderType;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laililmahfud\Adminportal\Traits\HasDatatable;

class Order extends Model
{
    use HasFactory, HasUuid,HasDatatable;

    protected $casts = [
        'type' => OrderType::class,
        'status' => OrderStatus::class,
        'data' => 'array'
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
