<?php
namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Services\Utils\SpecialProductsService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminSpecialProductController extends AdminController
{
    protected $routePath = "admin.special-product";
    protected $pageTitle = "Special This month";
    protected $resourcePath = "admin.banner.special-product";
    protected $moduleService = SpecialProductsService::class;
    protected $add = false;
    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Foto Merchant", "name" => "merchants.profile"],
        ["label" => "Nama Merchant", "name" => "merchants.name"],
        ["label" => "Alamat Merchant", "name" => "merchants.address"],
        ["label" => "Komisi (%)", "name" => "merchants.commission"],
        ["label" => "Foto Product", "name" => "products.image"],
        ["label" => "Nama Product", "name" => "products.name"],
        ["label" => "Tanggal Mulai Tayang", "name" => "featured_merchants.start_at"],
        ["label" => "Tanggal Selesai Tayang", "name" => "featured_merchants.end_at"],
        ["label" => "Harga Iklan", "name" => "orders.price"],
    ];


}
