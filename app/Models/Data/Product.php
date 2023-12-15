<?php

namespace App\Models\Data;

use App\Helpers\Susuk;
use App\Models\User\Merchant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;

class Product extends Model
{
    use HasFactory, HasUuid,HasDatatable;

    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_url',
        'price_formated'
    ];

    public function getProfileUrlAttribute()
    {
        return Susuk::showFile($this->profile);
    }

    public function getPriceFormatedAttribute()
    {
        return number_format($this->price, 0, ',', '.');
    }

    public function merchant()
    {
         return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }
}
