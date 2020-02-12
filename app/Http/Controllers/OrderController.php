<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $cart = session()->get('cart');
            if($cart == null){
                return back()->with('errors', 'Your cart empty');
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
            }
            DB::commit();
            return redirect('/');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
