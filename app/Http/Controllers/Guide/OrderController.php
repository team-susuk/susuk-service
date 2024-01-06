<?php

namespace App\Http\Controllers\Guide;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Guide\Order\OrderAction;
use App\Services\Data\OrderService;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ){}

    public function guide(Request $request, OrderAction $orderAction)
    {
        $orderAction->handle($request);

        return redirect()->back()->with(["success" => "Jika kamu sudah melakukan pembayaran, mohon segera konfirmasi ke admin agar dapat diproses. Terimakasih"]);
    }
}
