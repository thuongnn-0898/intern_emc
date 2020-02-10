<?php


namespace App\Services;



use App\Mail\UserOrder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Matrix\Exception;

class HandleOrderService
{

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function ordered()
    {
        try{
            $cart = session()->get('cart');
            $datas = [];
            foreach ($cart as $item) {
                array_push($datas, [
                    'product_id' => $item['id'],
                    'order_id' => $this->order->id,
                    'quantity' => $item['qty'],
                    'discount' => 0
                ]);
                $this->calcQtyProduct($item);
            }
            OrderDetail::insert($datas);
            session()->put('cart', []);
            Mail::to($this->order->user)->later(now(), new UserOrder($this->order));
        }catch (\Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function cancelOrderd($order, $type)
    {
        $this->calcQtyProduct($order->orderDetails, $type);
    }

    private function calcQtyProduct($data)
    {
        if($data instanceof \Illuminate\Database\Eloquent\Collection ){
            foreach ($data as $item){
                Product::where('id', $item->product_id)->increment('quantity', $item->quantity);
            }
        }else{
            Product::where('id', $data['id'])->decrement('quantity', $data['qty']);
        }
    }
}
