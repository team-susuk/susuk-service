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
        ["label" => "File/Gambar", "name" => "file"],
    ];

    protected $rules = [
        "type" => "required",
        "for_role" => "required",
        "title" => "required",
        "description" => "required",
    ];


    public function create(Request $request)
    {
        $this->data = [
            'types' => BroadcastType::cases()
        ];
        return parent::create($request);
    }

}
