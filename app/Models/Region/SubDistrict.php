<?php
namespace App\Models\Region;


use App\Models\Region\City;
use App\Models\Region\Province;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDistrict extends Model
{
    use HasFactory,HasUuid,HasDatatable;

    protected $table = "subdistricts";

    protected $guarded = [];

    
    public function province()
    {
         return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    
    public function city()
    {
         return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
