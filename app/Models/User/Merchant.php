<?php

namespace App\Models\User;

use App\Helpers\Susuk;
use App\Enums\UserStatus;
use App\Models\Data\Product;
use App\Models\Regions\City;
use App\Models\Master\Category;
use App\Models\Regions\Province;
use App\Models\Regions\SubDistrict;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory, HasUuid, HasDatatable, SoftDeletes;

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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_url',
        'full_address',
        'full_commission'
    ];

    public function getProfileUrlAttribute()
    {
        return Susuk::showFile($this->profile);
    }

    public function getFullAddressAttribute()
    {
        $address = $this->address;
        if ($this->subdistrict) $address .= ", {$this->subdistrict->name}";
        if ($this->city) $address .= ", {$this->city->name}";
        if ($this->province) $address .= ", {$this->province->name}";

        return $address;
    }

    public function getFullCommissionAttribute()
    {
        if ($this->commission['start'] == $this->commission['end']) {
            return $this->commission['start'] . "%";
        } else {
            return $this->commission['start'] . "% - " . $this->commission['end'] . "%";
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subdistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'subdistrict_id', 'id');
    }
    
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
