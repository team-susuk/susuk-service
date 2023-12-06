<?php
namespace App\Http\Controllers\Admin\Region;

use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Controllers\AdminController;
use App\Services\Region\CityService;

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
