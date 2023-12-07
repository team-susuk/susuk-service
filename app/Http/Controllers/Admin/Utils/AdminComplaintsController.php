<?php
namespace App\Http\Controllers\Admin\Utils;

use Illuminate\Http\Request;
use App\Services\Utils\ComplaintService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminComplaintsController extends AdminController
{
    protected $routePath = "admin.complaint";
    protected $pageTitle = "Complaint";
    protected $resourcePath = "admin.complaint";
    protected $moduleService = ComplaintService::class;
    protected $add = false;
    protected $filter = true;
    protected $export = true;

    protected $tableColumns = [
        ["label" => "Date", "name" => "created_at"],
        ["label" => "Role", "name" => "user_role"],
        ["label" => "Title", "name" => "title"],
        ["label" => "Message", "name" => "message"],
    ];

    protected $rules = [
        "user_id" => "required|min:3|max:150",
        "user_role" => "required|min:3|max:150",
        "title" => "required|min:3|max:150",
        "message" => "required|min:3|max:150",
    ];

}
