<?php

namespace App\Models\User;

use App\Enums\UserStatus;
use App\Models\Master\Category;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory, HasUuid, HasDatatable,SoftDeletes;

    protected $table = "merchants";
    protected $guarded = [];

    protected $casts = [
        'commission' => 'array',
        'weekdays' => 'array',
        'weekday_time' => 'array',
        'weekends' => 'array',
        'weekend_time' => 'array',
        'status' => UserStatus::class
    ];

    public function category()
    {
         return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
