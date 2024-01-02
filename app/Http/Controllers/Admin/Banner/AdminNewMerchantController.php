<?php
namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Services\Utils\NewMerchantsService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminNewMerchantController extends AdminController
{
    protected $routePath = "admin.new-merchant";
    protected $pageTitle = "New Merchant";
    protected $resourcePath = "admin.banner.new-merchant";
    protected $moduleService = NewMerchantsService::class;
    protected $add = false;
    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Foto Merchant", "name" => "merchants.profile"],
        ["label" => "Nama Merchant", "name" => "merchants.name"],
        ["label" => "Alamat Merchant", "name" => "merchants.address"],
        ["label" => "Komisi (%)", "name" => "merchants.commission"],
        ["label" => "Tanggal Mulai Tayang", "name" => "featured_merchants.start_at"],
        ["label" => "Tanggal Selesai Tayang", "name" => "featured_merchants.end_at"],
        ["label" => "Harga Paket", "name" => "orders.price"],
        ["label" => "Paket", "name" => "orders.benefit_value"],
    ];


}
