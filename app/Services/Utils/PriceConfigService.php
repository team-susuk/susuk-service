<?php
namespace App\Services\Utils;

use App\Enums\PriceType;
use Illuminate\Http\Request;
use App\Models\Utils\PriceConfig;
use Laililmahfud\Adminportal\Services\AdminService;

class PriceConfigService extends AdminService
{
    public function __construct(
        public $model = PriceConfig::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::where(function ($q) use ($search) {
            $q->orWhere("name", "like", "%" . $search . "%");
            $q->orWhere("description", "like", "%" . $search . "%");
            $q->orWhere("type", "like", "%" . $search . "%");
            $q->orWhere("price", "like", "%" . $search . "%");
            $q->orWhere("discount", "like", "%" . $search . "%");
            $q->orWhere("discount_type", "like", "%" . $search . "%");
            $q->orWhere("benefit_value", "like", "%" . $search . "%");
            $q->orWhere("benefit_type", "like", "%" . $search . "%");
            ;
        })
            ->select("*")
            ->datatable($perPage, "price_configs.created_at");

    }

    public function store(Request $request)
    {

        $data = $request->only(['name', 'description', 'type', 'price', 'discount', 'discount_type', 'benefit_value', 'benefit_type']);
        return $this->model::create($data);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['name', 'description', 'type', 'price', 'discount', 'discount_type', 'benefit_value', 'benefit_type']);

        return $this->model::whereUuid($uuid)->update($data);
    }

    public function getPackageMerchant()
    {
        $data = [
            (object)[
                'name' => 'Top Ads',
                'description' => 'Iklan ini akan muncul setelah guide login ke aplikasi (Tampilan Iklan satu Layar)',
                'type' => 'top-ads',
                'packages' => []
            ],
            (object)[
                'name' => 'Ads Banner',
                'description' => 'Iklan ini akan muncul di halaman utama beranda pada aplikasi guide',
                'type' => 'ads-banner',
                'packages' => []
            ],
            (object)[
                'name' => 'Blast Info Merchant',
                'description' => 'Blast pesan ke semua guide yang dikehendaki',
                'type' => 'blast',
                'packages' => []
            ],
            (object)[
                'name' => 'Top Merchants',
                'description' => 'Promosikan Tokomu sebagai Top Merchant agar dilihat semua guide',
                'type' => 'top-merchants',
                'packages' => []
            ],
            (object)[
                'name' => 'New Merchants',
                'description' => 'Promosikan Toko Baru Kamu agar dapat dilihat oleh semua guide.',
                'type' => 'new-merchants',
                'packages' => []
            ]
        ];

        foreach ($data as $key => $value) {
            switch ($value->type) {
                case 'top-ads':
                    $value->packages = $this->model::where("type", PriceType::Merchant_Top_Ads)->get();
                    break;
                case 'ads-banner':
                    $value->packages = $this->model::where("type", PriceType::Ads_Banner)->get();
                    break;
                case 'blast':
                    $value->packages = $this->model::where("type", PriceType::Blast_Merchant)->get();
                    break;
                case 'top-merchants':
                    $value->packages = $this->model::where("type", PriceType::Top_Merchant)->get();
                    break;
                case 'new-merchants':
                    $value->packages = $this->model::where("type", PriceType::New_Merchant)->get();
                    break;
            }
        }

        return $data;
    }

    public function getPackageProduct()
    {
        $data = [
            (object)[
                'name' => 'Top Ads',
                'description' => 'Iklan ini akan muncul setelah guide login ke aplikasi (Tampilan Iklan satu Layar)',
                'type' => 'top-ads',
                'packages' => []
            ],
            (object)[
                'name' => 'Ads Banner',
                'description' => 'Iklan ini akan muncul di halaman utama beranda pada aplikasi guide',
                'type' => 'ads-banner',
                'packages' => []
            ],
            (object)[
                'name' => 'Blast Info Merchant',
                'description' => 'Blast pesan ke semua guide yang dikehendaki',
                'type' => 'blast',
                'packages' => []
            ],
            (object)[
                'name' => 'Favorite Produk',
                'description' => 'Promosikan Produk Best Sellermu.',
                'type' => 'favorite-product',
                'packages' => []
            ],
            (object)[
                'name' => 'Special This Month',
                'description' => 'Produk special yang mau kamu tawarkan bulan ini.',
                'type' => 'special-this-month',
                'packages' => []
            ]
        ];

        foreach ($data as $key => $value) {
            switch ($value->type) {
                case 'top-ads':
                    $value->packages = $this->model::where("type", PriceType::Product_Top_Ads)->get();
                    break;
                case 'ads-banner':
                    $value->packages = $this->model::where("type", PriceType::Ads_Banner)->get();
                    break;
                case 'blast':
                    $value->packages = $this->model::where("type", PriceType::Blast_Merchant)->get();
                    break;
                case 'favorite-product':
                    $value->packages = $this->model::where("type", PriceType::Favorite_Product)->get();
                    break;
                case 'special-this-month':
                    $value->packages = $this->model::where("type", PriceType::Special_This_Month)->get();
                    break;
            }
        }

        return $data;
    }
}
