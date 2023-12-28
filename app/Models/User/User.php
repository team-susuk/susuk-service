<?php

namespace App\Models\User;

use Carbon\Carbon;
use App\Helpers\Susuk;
use App\Enums\UserStatus;
use Illuminate\Support\Str;
use App\Models\Regions\City;
use App\Models\Regions\Province;
use App\Models\Master\Profession;
use App\Models\Regions\SubDistrict;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, HasUuid, HasDatatable,SoftDeletes;

    protected $table = "users";
    protected $guarded = [];

    protected $casts = [
        'languages' => 'array',
        'status' => UserStatus::class
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_url'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (User $user) {
            $tanggal = now()->format('Y-m-d');
            $nomorUrutan = User::whereDate("created_at", $tanggal)->count();
            $nomorUrutan = intval(substr($nomorUrutan, 2));
            $nomorUrutan++;
            $user->code = "G-$tanggal-" . str_pad($nomorUrutan, 3, '0', STR_PAD_LEFT);
            $user->register_at = Carbon::now();
            $user->uuid = Str::uuid()->toString();
        });
    }

    public function getProfileUrlAttribute()
    {
        return Susuk::showFile($this->profile);
    }

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }

    public function scopeFindByUuid($query, $id)
    {
        return $query->where("uuid", $id)->firstOrFail();
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
}
