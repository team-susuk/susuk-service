<?php
namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Services\Users\MerchantService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminMerchantsController extends AdminController
{
    protected $routePath = "admin.merchant";
    protected $pageTitle = "Merchant";
    protected $resourcePath = "admin.users.merchant";
    protected $moduleService = MerchantService::class;
    protected $filter = true;
    protected $export = true;

    protected $tableColumns = [
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
        "name" => "required|min:3|max:150",
        "profile" => "required|min:3|max:150",
        "description" => "required|min:3|max:150",
        "category_id" => "required|min:3|max:150",
        "province_id" => "required|min:3|max:150",
        "city_id" => "required|min:3|max:150",
        "subdistrict_id" => "required|min:3|max:150",
        "address" => "required|min:3|max:150",
        "pic_name" => "required|min:3|max:150",
        "phone_number" => "required|min:3|max:150",
        "whatsapp_number" => "required|min:3|max:150",
        "commission" => "required|min:3|max:150",
        "weekdays" => "required|min:3|max:150",
        "weekday_time" => "required|min:3|max:150",
        "weekends" => "required|min:3|max:150",
        "weekend_time" => "required|min:3|max:150",
        "sip_document" => "required|min:3|max:150",
        "viewer" => "required|min:3|max:150",
        "is_member" => "required|min:3|max:150",
        "expired_member_at" => "required|min:3|max:150",
        "password" => "required|min:3|max:150",
        "deleted_at" => "required|min:3|max:150",
        "code" => "required|min:3|max:150",
    ];

}
