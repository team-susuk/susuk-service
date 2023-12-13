<?php

namespace App\Models\Utils;

use App\Helpers\Susuk;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $table = "banners";
    protected $guarded = [];
}
