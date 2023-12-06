<?php
namespace App\Models\Master;


use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $table = "categories";
    protected $guarded = [];
}
