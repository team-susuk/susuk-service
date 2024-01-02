<?php
namespace App\Services\Data;

use App\Models\Data\Order;
use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Services\AdminService;

class OrderGuideService extends AdminService
{
    public function __construct(
        public $model = Order::class,
    ) {}

    
    public function datatable(Request $request, $perPage = null)
    {
        $search = $request->search ?? '';

        $query = $this->model::query()
            ->join('users', 'users.id', 'orders.user_id')
            ->where('orders.user_role','guest')
            ->where(function ($q) use ($search) {
                $q->orWhere("orders.user_role", "like", "%" . $search . "%");
                $q->orWhere("orders.type", "like", "%" . $search . "%");
                $q->orWhere("orders.status", "like", "%" . $search . "%");
            })
            ->select('orders.*',  'users.name as user_name');
        if ($perPage) {
            return $query->datatable($perPage, "orders.created_at");
        } else {
            return $query->get();
        }

    }
}
