<?php
namespace App\Http\Controllers\Admin\Users;

use App\Enums\UserStatus;
use Illuminate\Http\Request;
use App\Services\Users\MerchantService;
use App\Services\Master\CategoryService;
use App\Services\Regions\ProvinceService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminMerchantsController extends AdminController
{
    protected $routePath = "admin.merchant";
    protected $pageTitle = "Merchant";
    protected $resourcePath = "admin.users.merchant";
    protected $moduleService = MerchantService::class;
    protected $filter = false;
    protected $export = true;

    protected $tableColumns = [
        ["label" => "Foto", "name" => "profile"],
        ["label" => "Name", "name" => "name"],
        ["label" => "Category", "name" => "category_id"],
        ["label" => "Code", "name" => "code"],
        ["label" => "Pic Name", "name" => "pic_name"],
        ["label" => "Phone Number", "name" => "phone_number"],
        ["label" => "Whatsapp Number", "name" => "whatsapp_number"],
        ["label" => "Register At", "name" => "register_at"],
        ["label" => "Viewer", "name" => "viewer"],
        ["label" => "Status", "name" => "status"],
    ];

    protected $rules = [
        "name" => "required",
        "description" => "required",
        "category_id" => "required",
        "province_id" => "required",
        "city_id" => "required",
        "subdistrict_id" => "required",
        "address" => "required",
        "pic_name" => "required",
        "phone_number" => "required",
        "whatsapp_number" => "required",
        "commission_start" => "required",
        "commission_end" => "required",
        "weekdays" => "required",
        "weekday_time_start" => "required",
        "weekday_time_end" => "required",
    ];

    protected $createRules = [
        "profile" => "required|image",
        "password" => "required",
    ];

    public function __construct(
        private CategoryService $categoryService,
        private ProvinceService $provinceService,
        private MerchantService $merchantService
    ){}

    public function create(Request $request)
    {
        $this->data = [
            'categories' => $this->categoryService->get(),
            'provinces' => $this->provinceService->findAll()
        ];
        return parent::create($request);
    }

    public function edit(Request $request,$uuid)
    {
        $this->data = [
            'categories' => $this->categoryService->get(),
            'provinces' => $this->provinceService->findAll(),
            'status' => UserStatus::cases()
        ];
        return parent::edit($request,$uuid);
    }

    public function show(Request $request, $uuid)
    {
        $row = $this->merchantService->findByUuId($uuid);
        return view('admin.users.merchant.detail', [
            'row' => $row
        ]);
    }

}
