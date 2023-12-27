<?php
namespace App\Http\Controllers\Admin\Data;

use Illuminate\Http\Request;
use App\Services\Data\ProductService;
use App\Services\Users\MerchantService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminProductsController extends AdminController
{
    protected $routePath = "admin.products";
    protected $pageTitle = "Products";
    protected $resourcePath = "admin.data.products";
    protected $moduleService = ProductService::class;

    protected $export = true;


    protected $tableColumns = [
        ["label" => "Foto", "name" => "image"],
        ["label" => "Product", "name" => "name"],
        ["label" => "Merchant", "name" => "merchant_id"],
        ["label" => "Description", "name" => "description"],
        ["label" => "Price", "name" => "price"],
        ["label" => "Komisi", "name" => "commission"],
        ["label" => "Viewer", "name" => "viewer"],
    ];

    protected $rules = [
        "merchant_id" => "required",
        "name" => "required",
        "description" => "required",
        "price" => "required",
        "commission" => "required|max:100",
    ];

    protected $createRules = [
        'image' => 'required|image'
    ];

    public function __construct(
        private MerchantService $merchantService
    ) {
    }

    public function create(Request $request)
    {
        $this->data = [
            'merchants' => $this->merchantService->findAllMerchantName()
        ];
        return parent::create($request);
    }

    public function edit(Request $request, $uuid)
    {
        $this->data = [
            'merchants' => $this->merchantService->findAllMerchantName()
        ];
        return parent::edit($request, $uuid);
    }
}
