<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function show()
    {
        return view('guest.cart.show');
    }

    public function store(Request $req)
    {
        $id = $req->id;
        $qty = $req->qty;
        $cart = session()->get('cart');
        try {
            $product = $this->product->getById($id);
            if($product->quantity < $qty)
                return response()->json(['status' => false, 'data'=> "Sorry, we only have $product->quantity left now"]);
            if(!isset($cart)) {
                $cart = [
                    $id => [
                        "id" => $product->id,
                        "name" => $product->name,
                        "qty" => $qty,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
                ];
                session()->put('cart', $cart);
            }elseif(isset($cart[$id])){
                $cart[$id]['qty']+= $qty;
                session()->put('cart', $cart);
            }else{
                $cart[$id] = [
                    "id" =>$product->id,
                    "name" => $product->name,
                    "qty" => $qty,
                    "price" => $product->price,
                    "image" => $product->image
                ];
                session()->put('cart', $cart);
            }

            return view('guest._cart_item', compact('cart'));
        }catch(\Exception $e){

            return response()->json(['status' => false, 'data'=> $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        $cart = session()->get('cart');

        return view('guest._cart_item', compact('cart'));
    }

    public function cartempty()
    {
        session()->forget('cart');

        return response()->json(['success' => true]);
    }
}
