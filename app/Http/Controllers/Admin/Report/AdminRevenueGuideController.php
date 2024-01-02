<?php
namespace App\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Controllers\AdminController;
use App\Services\Report\ReportRevenueGuideService;

class AdminRevenueGuideController extends AdminController
{
    protected $routePath = "admin.revenue-guide";
    protected $pageTitle = "Revenue Guide";
    protected $resourcePath = "admin.report.revenue-guide";
    protected $moduleService = ReportRevenueGuideService::class;
    protected $add = false;
    protected $bulkAction = false;
    protected $tableAction = false;
    protected $export = true;    
    
    protected $tableColumns = [
        ["label" => "Tanggal", "name" => "orders.created_at"],
        ["label" => "Foto", "name" => "users.profile"],
        ["label" => "Nama", "name" => "users.name"],
        ["label" => "Provinsi", "name" => "users.province_id"],
        ["label" => "Kabupaten/kotamadya", "name" => "users.city_id"],
        ["label" => "Kecamatan", "name" => "users.subdistrict_id"],
        ["label" => "Type", "name" => "orders.type"],
        ["label" => "Benefit Iklan", "name" => "orders.benefit_value"],
        ["label" => "Harga", "name" => "orders.price"],
    ];
    
}
