<?php

namespace App\Models\Data;

use App\Helpers\Susuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laililmahfud\Adminportal\Traits\HasUuid;

class Product extends Model
{
    use HasFactory, HasUuid;

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
}
