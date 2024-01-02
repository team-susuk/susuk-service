<?php
namespace App\Services\Report;

use App\Models\Data\Order;
use Illuminate\Http\Request;

class ReportRevenueMerchantService
{
     public function __construct(
          public $model = Order::class,
     ) {
     }


     public function datatable(Request $request, $perPage = null)
     {
          $search = $request->search ?? '';

          $query = $this->model::query()
               ->join('merchants', 'merchants.id', 'orders.user_id')
               ->where(function ($q) use ($search) {
                    $q->orWhere("orders.user_role", "like", "%" . $search . "%");
                    $q->orWhere("orders.type", "like", "%" . $search . "%");
                    $q->orWhere("merchants.name", "like", "%" . $search . "%");
               })
               ->where('orders.status', 'paid')
               ->select('orders.*', 'merchants.name as merchant_name', 'merchants.address as address_merchant');
          if ($perPage) {
               return $query->datatable($perPage, "orders.created_at");
          } else {
               return $query->get();
          }

     }
}