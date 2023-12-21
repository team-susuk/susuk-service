<?php

namespace App\Http\Controllers\Merchant;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Merchant\Order\OrderAction;
use App\Http\Resources\Merchant\OrderResource;
use App\Services\Data\OrderService;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ){}

    public function merchantOrder(Request $request, OrderAction $orderAction)
    {
        $orderAction->handleMerchant($request);

        return redirect()->back()->with(["success" => "Order Berhasil Dibuat, Silahkan Konfirmasi Admin"]);
    }

    public function productOrder(Request $request, OrderAction $orderAction, $id)
    {
        $orderAction->handleProduct($request, $id);

        return redirect()->back()->with(["success" => "Order Berhasil Dibuat, Silahkan Konfirmasi Admin"]);
    }

    public function merchantHistories()
    {
        return Inertia::render('Merchant/Order/MerchantHistories');
    }

    public function merchantHistoriesData()
    {
        return OrderResource::collection(
            $this->orderService->getMerchantHistories(merchant()->id)
        );
    }
}
