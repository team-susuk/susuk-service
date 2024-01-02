<?php
namespace App\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use App\Services\Report\ReportRevenueMerchantService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminRevenueMerchantController extends AdminController
{
    protected $routePath = "admin.revenue-merchant";
    protected $pageTitle = "Revenue Merchant";
    protected $resourcePath = "admin.report.revenue-merchant";
    protected $moduleService = ReportRevenueMerchantService::class;
    protected $add = false;
    protected $bulkAction = false;
    protected $tableAction = false;
    protected $export = true;    

    protected $tableColumns = [
        ["label" => "Tanggal", "name" => "orders.created_at"],
        ["label" => "Nama", "name" => "merchants.name"],
        ["label" => "Alamat", "name" => "merchants.address"],
        ["label" => "Nama Paket", "name" => "orders.type"],
        ["label" => "Paket", "name" => "orders.benefit_value"],
        ["label" => "Harga", "name" => "orders.price"],
    ];


    public function datatable(Request $request)
    {
        return $this->moduleService()->datatableRevenueMerchant($request, $this->perPage);
    }
}
