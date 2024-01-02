<?php
namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Services\Utils\TopAddsService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminTopAddsController extends AdminController
{
    protected $routePath = "admin.top-adds";
    protected $pageTitle = "Top Ads";
    protected $resourcePath = "admin.banner.top-adds";
    protected $moduleService = TopAddsService::class;
    protected $add = false;
    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Foto Merchant", "name" => "merchants.profile"],
        ["label" => "Nama Merchant", "name" => "merchants.name"],
        ["label" => "Alamat Merchant", "name" => "merchants.address"],
        ["label" => "Foto Iklan", "name" => "orders.image"],
        ["label" => "Tanggal Mulai Tayang", "name" => "orders.created_at"],
        ["label" => "Tanggal Selesai Tayang", "name" => "orders.expired_at"],
        ["label" => "Harga Iklan", "name" => "orders.price"],
        ["label" => "Paket", "name" => "orders.benefit_value"],
    ];

}
