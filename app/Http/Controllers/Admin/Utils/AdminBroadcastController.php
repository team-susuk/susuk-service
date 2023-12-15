<?php
namespace App\Http\Controllers\Admin\Utils;

use App\Enums\BroadcastType;
use Illuminate\Http\Request;
use App\Services\Notification\BroadcastService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminBroadcastController extends AdminController
{
    protected $routePath = "admin.broadcast";
    protected $pageTitle = "Broadcast";
    protected $resourcePath = "admin.utils.broadcast";
    protected $moduleService = BroadcastService::class;
    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Type", "name" => "type"],
        ["label" => "For Role", "name" => "for_role"],
        ["label" => "Title", "name" => "title"],
        ["label" => "Description", "name" => "description"],
        ["label" => "File", "name" => "file"],
        ["label" => "File Properties", "name" => "file_properties"],
    ];

    protected $rules = [
        "type" => "required|min:3|max:150",
        "for_role" => "required|min:3|max:150",
        "title" => "required|min:3|max:150",
        "description" => "required|min:3|max:150",
        "file" => "required|min:3|max:150",
        "file_properties" => "required|min:3|max:150",
    ];


    public function create(Request $request)
    {
        $this->data = [
            'types' => BroadcastType::cases()
        ];
        return parent::create($request);
    }

}
