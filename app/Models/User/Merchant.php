<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $table = "merchants";
    protected $guarded = [];
}
