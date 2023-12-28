<?php
namespace App\Http\Controllers\Admin\Data;

use Illuminate\Http\Request;
use App\Services\Data\ReservationService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminReservationsController extends AdminController
{
    protected $routePath = "admin.reservation";
    protected $pageTitle = "Reservasi";
    protected $resourcePath = "admin.data.reservation";
    protected $moduleService = ReservationService::class;
    protected $export = true;

    protected $add = false;

    protected $tableAction = false;

    protected $bulkAction = false;

    protected $tableColumns = [
        ["label" => "Date Create", "name" => "created_at"],
        ["label" => "Guide", "name" => "user_id"],
        ["label" => "Merchant", "name" => "merchant_id"],
        ["label" => "Alamat Merchant", "name" => "merchant_id"],
        ["label" => "Waktu Kedatangan", "name" => "time_arrival"],
        ["label" => "Jumlah Tamu", "name" => "guest_number"],
        ["label" => "Jenis Tamu", "name" => "guest_type"],
    ];

}
