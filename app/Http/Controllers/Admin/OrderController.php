<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
class OrderController extends AdminController
{
    protected $order;
    public function __construct(OrderRepository $order)
    {
        $this->middleware('role', ['except' => ['show']]);
        $this->order = $order;
    }
    public function index()
    {
        $orders = Order::with('user', 'orderDetails')->orderBy('status')->paginate(5);
        return view('admin.order.index', compact('orders'));
    }
    public function update(Request $req, $id)
    {
        $order = $this->order->updateById($id, ['status' => $req->type]);
        return view('guest.users._order_item', compact('order'));
    }
    public function show($id)
    {
        $order = $this->order->with('user', 'orderDetails', 'orderDetails.product')->getById($id);
        return view('admin._order_details', compact('order'));
    }
    public function destroy($id)
    {
        $this->order->deleteById($id);
        return redirect()->route('order.index');
    }
}
