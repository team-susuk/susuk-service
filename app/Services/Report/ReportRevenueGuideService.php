<?php
namespace App\Services\Report;

use App\Models\Data\Order;
use Illuminate\Http\Request;

class ReportRevenueGuideService
{
     public function __construct(
          public $model = Order::class,
     ) {
     }


     public function datatable(Request $request, $perPage = null)
     {
          $search = $request->search ?? '';

          $query = $this->model::query()
               ->join('users', 'users.id', 'orders.user_id')
               ->leftJoin('provinces','provinces.id','users.province_id')
               ->leftJoin('cities','cities.id','users.city_id')
               ->leftJoin('subdistricts','subdistricts.id','users.subdistrict_id')
               ->where(function ($q) use ($search) {
                    $q->orWhere("orders.user_role", "like", "%" . $search . "%");
                    $q->orWhere("orders.type", "like", "%" . $search . "%");
                    $q->orWhere("users.name", "like", "%" . $search . "%");
               })
               ->where('orders.status', 'paid')
               ->select('orders.*', 'users.name as user_name','users.profile',"provinces.name as province_name","cities.name as city_name","subdistricts.name as district_name");
          if ($perPage) {
               return $query->datatable($perPage, "orders.created_at");
          } else {
               return $query->get();
          }

     }
}