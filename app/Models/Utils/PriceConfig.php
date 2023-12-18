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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'price_formated',
        'type_formated',
        'discount_formated',
        'inactive_price_formated'
    ];

    public function getPriceFormatedAttribute()
    {
        if ($this->discount != 0) {
            $discount = $this->discount_type == 'nominal' ? $this->discount : ($this->price * $this->discount / 100);
            return number_format($this->price - $discount, 0, ',', '.');
        } else {
            return number_format($this->price, 0, ',', '.');
        }
    }

    public function getInactivePriceFormatedAttribute()
    {
        return number_format($this->price, 0, ',', '.');
    }

    public function getDiscountFormatedAttribute()
    {
        return number_format($this->discount, 0, ',', '.');
    }

    public function getTypeFormatedAttribute()
    {
        switch ($this->benefit_type) {
            case 'day':
                return $this->benefit_value . ' Hari';
                break;
            case 'month':
                return $this->benefit_value . ' Bulan';
                break;
            case 'product':
                return $this->benefit_value . ' Produk';
                break;
        }
    }
}
