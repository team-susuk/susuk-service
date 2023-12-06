<?php
namespace App\Http\Controllers\Admin\Master;

use Laililmahfud\Adminportal\Controllers\AdminController;
use App\Services\Master\LanguageService;

class AdminLanguagesController extends AdminController
{
    protected $routePath = "admin.languages";
    protected $pageTitle = "Language";
    protected $resourcePath = "admin.master.languages";
    protected $moduleService = LanguageService::class;


    protected $tableColumns = [
        ["label" => "Language", "name" => "lang"],
    ];

    protected $rules = [
        "lang" => "required|min:3|max:150",
    ];
}
