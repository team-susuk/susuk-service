<?php
namespace App\Http\Controllers\Admin\Utils;

use Illuminate\Http\Request;
use App\Services\Utils\ResetPasswordService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminResetPasswordController extends AdminController
{
    protected $routePath = "admin.reset-password";
    protected $pageTitle = "Reset Password";
    protected $resourcePath = "admin.utils.reset-password";
    protected $moduleService = ResetPasswordService::class;
    protected $add = false;
    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Role", "name" => "user_role"],
        ["label" => "Name", "name" => "name"],
        ["label" => "Phone Number", "name" => "phone_number"],
        ["label" => "Request At", "name" => "request_at"],
        ["label" => "Status", "name" => "status"],
        ["label" => "Resolve At", "name" => "resolve_at"],
    ];

    protected $rules = [
        "password" => "required"
    ];


}
