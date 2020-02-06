<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\HandleOrderService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Pusher\Pusher;

class OrderController extends Controller
{

    public function show($id)
    {
        $order = Order::with('user', 'orderDetails', 'orderDetails.product')->findOrFail($id);
        return view('admin._order_details', compact('order'));
    }

    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $cart = session()->get('cart');
            if($cart == null){

                return back()->with(trans('status.fail'), trans('product.cartEmpty'));
            }else{
                $order = Auth::user()->orders()->create($request->all());
                foreach ($cart as $k => $item){
                    $orderDetail = [
                        'quantity' => $item['qty'],
                        'product_id' => $item['id'],
                        'discount' => 0
                    ];
                    $order->orderDetails()->create($orderDetail);
                }
                session()->forget('cart');
                Mail::to(Auth::user())->later(now(), new UserOrder($order));
                $this->chanelNotifi($order);
                $service = new HandleOrderService($order);
                $service->ordered();
            }
            DB::commit();

            return redirect('/')->with(['flash-msg' => [
                'status'=> trans('status.ok'),
                'msg' => trans('order.success')
            ],
            ]);;
        }catch (\Exception $e){
            DB::rollBack();

            return back()->withInput()->with([
                'flash' => [
                    'status' => trans('status.caut'),
                    'message' => trans('order.fail')
                ],
            ]);
        }
    }

    private function chanelNotifi($order)
    {
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $item = View::make('admin._item_order_noti',['item' => $order]);
        $bigItem = View::make('guest.users._order_item', ['order' => $order, 'userAdmin' => true]);
        $data = [
            'title' => trans('order.titleInfo'),
            'content' => trans('order.contentInfo', ['name' => $order->user->name]),
            'item' => $item->render(),
            'bigItem' => $bigItem->render(),
        ];
        $pusher->trigger('Notify', 'order', $data);
    }
}
