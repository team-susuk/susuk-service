<?php
namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Services\Utils\TopAddsService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminTopAddsController extends AdminController
{
    protected $routePath = "admin.top-adds";
    protected $pageTitle = "Top Adds";
    protected $resourcePath = "admin.banner.top-adds";
    protected $moduleService = TopAddsService::class;
    protected $add = false;
    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Foto Merchant", "name" => "merchants.profile"],
        ["label" => "Nama Merchant", "name" => "merchants.name"],
        ["label" => "Alamat Merchant", "name" => "merchants.address"],
        ["label" => "Image", "name" => "orders.image"],
        ["label" => "Harga Iklan", "name" => "orders.price"],
    ];

}
