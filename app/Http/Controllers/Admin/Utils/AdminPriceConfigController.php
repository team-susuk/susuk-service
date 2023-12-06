<?php
namespace App\Http\Controllers\Admin\Utils;

use App\Enums\PriceType;
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
        ["label" => "Benefit", "name" => "benefit_value"],
    ];

    protected $rules = [
        "name" => "required|min:3|max:150",
        "description" => "required|min:3",
        "type" => "required|min:3",
        "price" => "required",
        "discount" => "required",
        "discount_type" => "required|min:3",
        "benefit_value" => "required",
        "benefit_type" => "required|min:3",
    ];

    public function create(Request $request)
    {
        $this->data = [
            'price_types' => PriceType::cases()
        ];
        return parent::create($request);
    }

    public function edit(Request $request,$id)
    {
        $this->data = [
            'price_types' => PriceType::cases()
        ];
        return parent::edit($request,$id);
    }
}
