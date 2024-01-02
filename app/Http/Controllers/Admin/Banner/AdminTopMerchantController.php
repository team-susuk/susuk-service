<?php
namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Services\Utils\TopMerchantsService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminTopMerchantController extends AdminController
{
    protected $routePath = "admin.top-merchant";
    protected $pageTitle = "Top Merchant";
    protected $resourcePath = "admin.banner.top-merchant";
    protected $moduleService = TopMerchantsService::class;
    protected $add = false;
    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Foto Merchant", "name" => "merchants.profile"],
        ["label" => "Nama Merchant", "name" => "merchants.name"],
        ["label" => "Alamat Merchant", "name" => "merchants.address"],
        ["label" => "Komisi (%)", "name" => "merchants.commission"],
        ["label" => "Tanggal Mulai Tayang", "name" => "featured_merchants.start_at"],
        ["label" => "Tanggal Selesai Tayang", "name" => "featured_merchants.end_at"],
        ["label" => "Harga Iklan", "name" => "orders.price"],
    ];

}
