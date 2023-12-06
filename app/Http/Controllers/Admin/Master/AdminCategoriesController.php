<?php
namespace App\Http\Controllers\Admin\Master;

use App\Services\Master\CategoryService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminCategoriesController extends AdminController
{
    protected $routePath = "admin.categories";
    protected $pageTitle = "Merchant Category";
    protected $resourcePath = "admin.master.categories";
    protected $moduleService = CategoryService::class;


    protected $tableColumns = [
        ["label" => "Name", "name" => "name"],
    ];

    protected $rules = [
        "name" => "required|min:3|max:150",
    ];
}
