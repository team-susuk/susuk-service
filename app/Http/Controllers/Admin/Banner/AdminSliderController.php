<?php
namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Services\Utils\BannerService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminSliderController extends AdminController
{
    protected $routePath = "admin.slider";
    protected $pageTitle = "Slider";
    protected $resourcePath = "admin.banner.slider";
    protected $moduleService = BannerService::class;


    protected $tableColumns = [
        ["label" => "Foto Merchant", "name" => "merchants.profile"],
        ["label" => "Nama Merchant", "name" => "merchants.name"],
        ["label" => "Alamat Merchant", "name" => "merchants.address"],
        ["label" => "Komisi (%)", "name" => "merchants.commission"],
        ["label" => "Foto Iklan", "name" => "banners.image"],
        ["label" => "Expired At", "name" => "banners.expired_at"],
        ["label" => "Source", "name" => "banners.merchant_id"],
        ["label" => "Sorting", "name" => "banners.sorting"],
        ["label" => "Harga Paket", "name" => "orders.price"],
        ["label" => "Paket", "name" => "orders.benefit_value"],
    ];

    protected $rules = [
        "sorting" => "required",
    ];

    protected $createRules = [
        "title" => "required|min:3|max:150",
        "description" => "required|min:3|max:150",
        "image" => 'required|file|image'
    ];
}
