<?php
namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Services\Users\UserService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminGuideController extends AdminController
{
    protected $routePath = "admin.guide";
    protected $pageTitle = "Guide";
    protected $resourcePath = "admin.users.guide";
    protected $moduleService = UserService::class;
    protected $filter = true;
    protected $export = true;

    protected $tableColumns = [
        ["label" => "Name", "name" => "name"],
        ["label" => "Nick Name", "name" => "nick_name"],
        ["label" => "Code", "name" => "code"],
        ["label" => "Phone Number", "name" => "phone_number"],
        ["label" => "Register At", "name" => "register_at"],
        ["label" => "Status", "name" => "status"],
    ];

    protected $rules = [
        "name" => "required|min:3|max:150",
        "nick_name" => "required|min:3|max:150",
        "birthday" => "required|min:3|max:150",
        "phone_number" => "required|min:3|max:150",
        "profile" => "required|min:3|max:150",
        "profession_id" => "required|min:3|max:150",
        "languages" => "required|min:3|max:150",
        "password" => "required|min:3|max:150",
        "status" => "required|min:3|max:150",
        "register_at" => "required|min:3|max:150",
        "verification_at" => "required|min:3|max:150",
        "deleted_at" => "required|min:3|max:150",
        "code" => "required|min:3|max:150",
        "is_member" => "required|min:3|max:150",
        "expired_member_at" => "required|min:3|max:150",
    ];


}
