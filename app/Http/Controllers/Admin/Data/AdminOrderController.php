<?php
namespace App\Http\Controllers\Admin\Data;

use Illuminate\Http\Request;
use App\Services\Data\OrderService;
use App\Actions\Admin\Orders\UpdateOrderStatus;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminOrderController extends AdminController
{
    protected $routePath = "admin.orders";
    protected $pageTitle = "Orders";
    protected $resourcePath = "admin.data.orders";
    protected $moduleService = OrderService::class;
    protected $export = true;
    protected $add = false;

    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Type", "name" => "type"],
        ["label" => "Role", "name" => "user_role"],
        ["label" => "User", "name" => "user_id"],
        ["label" => "Benefit", "name" => "benefit_value"],
        ["label" => "Price", "name" => "price"],
        ["label" => "Image", "name" => "image"],
        ["label" => "Status", "name" => "status"],
        ["label" => "Pay At", "name" => "pay_at"],
        ["label" => "Expired At", "name" => "expired_at"],
    ];

    public function updateStatus(Request $request, UpdateOrderStatus $updateOrderStatus, $uuid, $status)
    {
        $updateOrderStatus->handle($uuid, $status);
        return back()->with(['success' => 'Successfully !']);
    }

}
