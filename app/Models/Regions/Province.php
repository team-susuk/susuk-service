<?php
namespace App\Models\Regions;


use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $table = "provinces";
    protected $guarded = [];
}
