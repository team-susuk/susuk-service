<?php

namespace App\Models\Notification;

use App\Enums\BroadcastType;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Broadcast extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $casts = [
        "type" => BroadcastType::class,
        "file_properties" => "array"
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'file_url'
    ];

    public function getFileUrlAttribute()
    {
        return Susuk::showFile($this->file);
    }
}
