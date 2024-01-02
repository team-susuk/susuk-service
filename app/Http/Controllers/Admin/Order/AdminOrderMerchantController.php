<?php
namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Services\Data\OrderService;
use App\Actions\Admin\Orders\UpdateOrderStatus;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminOrderMerchantController extends AdminController
{
    protected $routePath = "admin.order-merchant";
    protected $pageTitle = "Order Merchant";
    protected $resourcePath = "admin.order.order-merchant";
    protected $moduleService = OrderService::class;
    protected $export = true;
    protected $add = false;

    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Type", "name" => "type"],
        ["label" => "Name", "name" => "user_id"],
        ["label" => "Paket", "name" => "benefit_value"],
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
