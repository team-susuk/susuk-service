<?php

namespace App\Models\Notification;

use App\Enums\NotificationType;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory, HasUuid;

    protected $table = "notifications";
    protected $guarded = [];
    protected $casts = [
        'data' => 'array',
        "type" => NotificationType::class,
    ];

    public function broadcast()
    {
        return $this->hasOne(Broadcast::class,'id','broadcast_id');
    }
}
