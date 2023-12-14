<?php

namespace App\Models\Notification;

use App\Enums\NotificationType;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $casts = [
        "type" => NotificationType::class,
        'data' => 'array'
    ];

    public function broadcast()
    {
        return $this->belongsTo(Broadcast::class);
    }
}
