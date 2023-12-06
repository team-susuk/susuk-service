<?php
namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Services\Master\ProfessionService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminProfessionsController extends AdminController
{
    protected $routePath = "admin.professions";
    protected $pageTitle = "Profession";
    protected $resourcePath = "admin.master.professions";
    protected $moduleService = ProfessionService::class;


    protected $tableColumns = [
        ["label" => "Name", "name" => "name"],
    ];

    protected $rules = [
        "name" => "required|min:3|max:150",
    ];

}
