<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Services\HandleOrderService;
use Illuminate\Http\Request;
use Matrix\Exception;


class OrderController extends Controller
{
    protected $order;

    public function __construct(OrderRepository $order)
    {
        $this->middleware('role', ['except' => ['show']]);
        $this->order = $order;
    }

    public function index()
    {
        $orders = Order::with('user', 'orderDetails')->orderBy('status', 'asc')->paginate(\Config::get('settings.perPage'));
        return view('admin.order.index', compact('orders'));
    }

    public function update(Request $req, $id)
    {
        try{
            $order = $this->order->updateById($id, ['status' => $req->type]);
            if($req->type == 2){
                $service = new HandleOrderService($order);
                $service->cancelOrderd($order,  $req->type);
            }

            return view('guest.users._order_item', compact('order'));
        }catch (\Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function show($id)
    {
        $order = $this->order->with('user', 'orderDetails', 'orderDetails.product')->getById($id);
        return view('admin._order_details', compact('order'));
    }

    public function destroy($id)
    {
        try {
            $order = $this->order->getById($id);
            $service = new HandleOrderService($order);
            $service->cancelOrderd($order, 2);
            $order->delete();
        }catch (\Exception $e){
            dd($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
}
