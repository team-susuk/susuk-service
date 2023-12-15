<?php

namespace App\Models\Data;

use App\Enums\GuestType;
use App\Models\User\Merchant;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;

class Reservation extends Model
{
    use HasFactory, HasUuid,HasDatatable;

    protected $guarded = [];

    protected $casts = [
        "guest_type" => GuestType::class
    ];

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
