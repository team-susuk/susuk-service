<?php
namespace App\Http\Controllers\Admin\Utils;

use Illuminate\Http\Request;
use App\Services\Utils\PriceConfigService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminPriceConfigController extends AdminController
{
    protected $routePath = "admin.price-configs";
    protected $pageTitle = "Price Setting";
    protected $resourcePath = "admin.utils.price-configs";
    protected $moduleService = PriceConfigService::class;


    protected $tableColumns = [
        ["label" => "Name", "name" => "name"],
        ["label" => "Description", "name" => "description"],
        ["label" => "Type", "name" => "type"],
        ["label" => "Price", "name" => "price"],
        ["label" => "Discount", "name" => "discount"],
        ["label" => "Discount Type", "name" => "discount_type"],
        ["label" => "Benefit Value", "name" => "benefit_value"],
        ["label" => "Benefit Type", "name" => "benefit_type"],
    ];

    protected $rules = [
        "name" => "required|min:3|max:150",
        "description" => "required|min:3|max:150",
        "type" => "required|min:3|max:150",
        "price" => "required|min:3|max:150",
        "discount" => "required|min:3|max:150",
        "discount_type" => "required|min:3|max:150",
        "benefit_value" => "required|min:3|max:150",
        "benefit_type" => "required|min:3|max:150",
    ];
}
