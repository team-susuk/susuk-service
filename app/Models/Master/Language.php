<?php
namespace App\Models\Master;


use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $table = "languages";
    protected $guarded = [];
}
