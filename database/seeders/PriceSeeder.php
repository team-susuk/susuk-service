<?php

namespace Database\Seeders;

use App\Enums\PriceType;
use App\Models\Utils\PriceConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Berlangganan
            [
                'name' => 'Berlangganan',
                'description' => 'Dapat melihat semua info merchant dan susuk',
                'type' => PriceType::Guide_Show_Merchant,
                'price' => 150000,
                'discount' => 100,
                'discount_type' => 'percent',
                'benefit_value' => 1,
                'benefit_type' => 'month'
            ],
            [
                'name' => 'Berlangganan',
                'description' => 'Dapat melihat semua info member',
                'type' => PriceType::Merchant_Show_Guide,
                'price' => 150000,
                'discount' => 100,
                'discount_type' => 'percent',
                'benefit_value' => 1,
                'benefit_type' => 'month'
            ],
            // MERCHANT
            [
                'name' => 'Paket Happy',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul setelah user login',
                'type' => PriceType::Merchant_Top_Ads,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 5,
                'benefit_type' => 'day'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul setelah user login',
                'type' => PriceType::Merchant_Top_Ads,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 10,
                'benefit_type' => 'day'
            ],

            [
                'name' => 'Paket Happy',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul banner yang paling atas',
                'type' => PriceType::Ads_Banner,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 5,
                'benefit_type' => 'day'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul banner yang paling atas',
                'type' => PriceType::Ads_Banner,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 10,
                'benefit_type' => 'day'
            ],

            [
                'name' => 'Paket Happy',
                'description' => 'Kamu dapat memberikan iklan kepada guide yang akan masuk ke menu pesan',
                'type' => PriceType::Blast_Merchant,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => null,
                'benefit_type' => null
            ],
            // [
            //     'name' => 'Paket Murah',
            //     'description' => 'Kamu dapat memberikan iklan kepada guide yang akan masuk ke menu pesan',
            //     'type' => PriceType::Blast_Merchant,
            //     'price' => 150000,
            //     'discount' => 0,
            //     'discount_type' => 'percent',
            //     'benefit_value' => 10,
            //     'benefit_type' => 'day'
            // ],

            [
                'name' => 'Paket Happy',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 1',
                'type' => PriceType::Top_Merchant,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 7,
                'benefit_type' => 'day'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 1',
                'type' => PriceType::Top_Merchant,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 30,
                'benefit_type' => 'day'
            ],

            [
                'name' => 'Paket Happy',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 2',
                'type' => PriceType::New_Merchant,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 7,
                'benefit_type' => 'day'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 2',
                'type' => PriceType::New_Merchant,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 30,
                'benefit_type' => 'day'
            ],

            // PRODUCT
            [
                'name' => 'Paket Happy',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul setelah user login',
                'type' => PriceType::Product_Top_Ads,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 5,
                'benefit_type' => 'day'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul setelah user login',
                'type' => PriceType::Product_Top_Ads,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 10,
                'benefit_type' => 'day'
            ],

            [
                'name' => 'Paket Happy',
                'description' => 'Kamu dapat memberikan iklan kepada guide yang akan masuk ke menu pesan',
                'type' => PriceType::Blast_Product,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => null,
                'benefit_type' => null
            ],
            // [
            //     'name' => 'Paket Murah',
            //     'description' => 'Kamu dapat memberikan iklan kepada guide yang akan masuk ke menu pesan',
            //     'type' => PriceType::Blast_Product,
            //     'price' => 150000,
            //     'discount' => 0,
            //     'discount_type' => 'percent',
            //     'benefit_value' => 10,
            //     'benefit_type' => 'day'
            // ],

            [
                'name' => 'Paket Happy',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 3',
                'type' => PriceType::Special_This_Month,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 5,
                'benefit_type' => 'day'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 3',
                'type' => PriceType::Special_This_Month,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 10,
                'benefit_type' => 'day'
            ],

            [
                'name' => 'Paket Happy',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 4',
                'type' => PriceType::Favorite_Product,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 7,
                'benefit_type' => 'day'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan memberi promosi ini toko anda akan muncul di tengah 4',
                'type' => PriceType::Favorite_Product,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 30,
                'benefit_type' => 'day'
            ],

            [
                'name' => 'Paket Happy',
                'description' => 'Dengan membeli paket ini anda bisa menambahkan produk',
                'type' => PriceType::Add_Product,
                'price' => 120000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 3,
                'benefit_type' => 'product'
            ],
            [
                'name' => 'Paket Murah',
                'description' => 'Dengan membeli paket ini anda bisa menambahkan produk',
                'type' => PriceType::Add_Product,
                'price' => 150000,
                'discount' => 0,
                'discount_type' => 'percent',
                'benefit_value' => 6,
                'benefit_type' => 'product'
            ],
        ];

        

        foreach ($data as $key => $value) {
            PriceConfig::create($value);
        }
    }
}
