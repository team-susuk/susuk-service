<?php

namespace App\Models\Data;

use App\Enums\OrderStatus;
use App\Helpers\Susuk;
use App\Enums\OrderType;
use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laililmahfud\Adminportal\Traits\HasDatatable;

class Order extends Model
{
    use HasFactory, HasUuid, HasDatatable;

    protected $casts = [
        'type' => OrderType::class,
        'status' => OrderStatus::class,
        'data' => 'array'
    ];

    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image_url',
        'benefit_formated',
        'data_detail'
    ];

    public function getImageUrlAttribute()
    {
        return Susuk::showFile($this->image);
    }

    public function getBenefitFormatedAttribute()
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
            case null:
                return "Order";
                break;
        }
    }
    public function getDataDetailAttribute()
    {
        $detail = null;
        $type = $this->type;
        $orderData = $this->data;
        if (in_array($type, [OrderType::Favorite_Product, OrderType::Special_This_Month])) {
            $detail .= "Nama Produk : {$this->product_name}";
            $detail .= "<br>Harga Produk : Rp." . number_format($this->product_price);
            $detail .= "<br>Komisi Produk : {$this->product_commission}%";
        } else if (in_array($type,[OrderType::Blast_Merchant,OrderType::Blast_Product])) {
            $kabupaten = $this->city_name ?: 'Semua';
            $bahasa = implode(', ',$orderData['languages'] ?: []);
            $detail .= "Profesi : {$this->profession_name}";
            $detail .= "<br>Provinsi : {$this->province_name}";
            $detail .= "<br>Kabupaten : {$kabupaten}";
            $detail .= "<br>Bahasa : {$bahasa}";
            if($type==OrderType::Blast_Product){
                $detail .= "<br>Nama Produk : {$this->product_name}";
                $detail .= "<br>Harga Produk : Rp." . number_format($this->product_price);
                $detail .= "<br>Komisi Produk : {$this->product_commission}%";
            }
        }
        return $detail;
    }
}
