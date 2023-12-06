<?php
namespace App\Models\Region;


use App\Models\Region\Province;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $table = "cities";

    protected $guarded = [];

    public function province()
    {
         return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
