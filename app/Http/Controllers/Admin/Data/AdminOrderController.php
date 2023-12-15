<?php
namespace App\Http\Controllers\Admin\Data;

use App\Services\Data\OrderService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminOrderController extends AdminController
{
    protected $routePath = "admin.orders";
    protected $pageTitle = "Orders";
    protected $resourcePath = "admin.data.orders";
    protected $moduleService = OrderService::class;
    protected $export = true;
    protected $add = false;

    protected $tableAction = false;

    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "User Id", "name" => "user_id"],["label" => "User Role", "name" => "user_role"],
        ["label" => "Type", "name" => "type"],["label" => "Image", "name" => "image"],
        ["label" => "Benefit Value", "name" => "benefit_value"],["label" => "Benefit Type", "name" => "benefit_type"],
        ["label" => "Price", "name" => "price"],["label" => "Status", "name" => "status"],
        ["label" => "Expired At", "name" => "expired_at"],["label" => "Pay At", "name" => "pay_at"],
    ];
    
}
