<?php

namespace App\Models\User;

use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, HasUuid, HasDatatable,SoftDeletes;

    protected $table = "users";
    protected $guarded = [];

    protected $casts = [
        'languages' => 'array',
        'status' => UserStatus::class
    ];
}
