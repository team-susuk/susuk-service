<?php
namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Services\Data\OrderGuideService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminOrderGuideController extends AdminController
{
    protected $routePath = "admin.order-guide";
    protected $pageTitle = "Order Guide";
    protected $resourcePath = "admin.order.order-guide";
    protected $moduleService = OrderGuideService::class;
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
    
}
