<?php
namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Services\Utils\BannerService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminSliderController extends AdminController
{
    protected $routePath = "admin.slider";
    protected $pageTitle = "Slider";
    protected $resourcePath = "admin.banner.slider";
    protected $moduleService = BannerService::class;


    protected $tableColumns = [
        ["label" => "Image", "name" => "image"],
        ["label" => "Expired At", "name" => "expired_at"],
        ["label" => "Source", "name" => "merchant_id"],
        ["label" => "Sorting", "name" => "sorting"],
    ];

    protected $rules = [
        "sorting" => "required",
    ];

    protected $createRules = [
        "title" => "required|min:3|max:150",
        "description" => "required|min:3|max:150",
        "image" => 'required|file|image'
    ];
}
