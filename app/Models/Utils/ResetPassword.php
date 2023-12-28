<?php

namespace App\Models\Utils;

use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResetPassword extends Model
{
    use HasFactory,HasUuid,HasDatatable;

    protected $table = "reset_password";
    protected $guarded = [];
}
