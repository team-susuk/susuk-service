<?php
namespace App\Http\Controllers\Admin\Regions;

use App\Services\Regions\CityService;
use Illuminate\Http\Request;
use App\Services\Regions\SubDistrictService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminSubdistrictsController extends AdminController
{
    protected $routePath = "admin.subdistricts";
    protected $pageTitle = "Subdistrict";
    protected $resourcePath = "admin.regions.subdistricts";
    protected $moduleService = SubDistrictService::class;
    protected $bulkAction = false;
    protected $tableAction = false;
    protected $add = false;
    protected $perPage = 15;
    protected $tableColumns = [
        ["label" => "Province", "name" => "province_id"],
        ["label" => "City", "name" => "city_id"],
        ["label" => "Name", "name" => "name"],
    ];

    public function __construct(
        private CityService $cityService,
        private SubDistrictService $subDistrictService
    ) {
    }

    public function city(Request $request, $provinceId)
    {
        return $this->cityService->findAllByProvinceId($provinceId);
    }

    public function subDistrict(Request $request, $cityId)
    {
        return $this->subDistrictService->findAllByCityId($cityId);
    }
}
