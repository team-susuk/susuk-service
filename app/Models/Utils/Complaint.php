<?php

namespace App\Models\Utils;

use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory,HasUuid,HasDatatable;

    protected $table = "complaints";
    protected $guarded = [];
}
