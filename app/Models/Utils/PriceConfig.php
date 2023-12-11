<?php
namespace App\Models\Utils;


use App\Enums\PriceType;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasDatatable;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PriceConfig extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $table = "price_configs";
    protected $guarded = [];

    protected $casts = [
        'type' => PriceType::class
    ];
}
