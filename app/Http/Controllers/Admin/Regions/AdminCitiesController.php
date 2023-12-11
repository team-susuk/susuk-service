<?php
namespace App\Http\Controllers\Admin\Regions;

use Illuminate\Http\Request;
use App\Services\Regions\CityService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminCitiesController extends AdminController
{
    protected $routePath = "admin.cities";
    protected $pageTitle = "City";
    protected $resourcePath = "admin.regions.cities";
    protected $moduleService = CityService::class;
    protected $bulkAction = false;
    protected $tableAction = false;
    protected $add = false;
    protected $perPage = 15;

    protected $tableColumns = [
        ["label" => "Province", "name" => "province_id"],
        ["label" => "Name", "name" => "name"],
    ];

}
