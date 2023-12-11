<?php
namespace App\Http\Controllers\Admin\Regions;

use Illuminate\Http\Request;
use App\Services\Regions\ProvinceService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminProvincesController extends AdminController
{
    protected $routePath = "admin.provinces";
    protected $pageTitle = "Province";
    protected $resourcePath = "admin.regions.provinces";
    protected $moduleService = ProvinceService::class;
    protected $bulkAction = false;
    protected $tableAction = false;
    protected $add = false;
    protected $perPage = 15;

    protected $tableColumns = [
        ["label" => "Name", "name" => "name"],
    ];

}
