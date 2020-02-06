<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $cates = Category::where('parent_id', null)->get();
        $productsNew = Product::with(['category', 'option'])->byOption('new')->get();
        $productsSale = Product::with(['category', 'option'])->byOption('sale')->get();
        return view('guest.index', compact(['productsNew' , 'productsSale', 'cates']));
    }

    public function show($id)
    {
        $product = $this->product->getById($id);
        return view('guest.product.show', compact('product'));
    }

    public function review(ReviewRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = $this->product->getById($request->product_id);
            $data = $request->all();
            if($product->rate()->first() == null){
                $rateSetting = \Config::get('settings.rates');
                $rateSetting[$data['rates']] += 1;
                $data['rates'] = $rateSetting;
                $data['user_id'] = Auth::id();
                $product->rate()->create($data);
            }else{
                $rate = $product->rate->rates;
                $rate[$data['rates']]+= 1;
                $product->rate()->update([
                    'product_id' => $data['product_id'],
                    'rates' => $rate,
                ]);
            }
            Auth::user()->comments()->create($data);
            DB::commit();

            return redirect()->back()->with([
                'flash-msg' => [
                    'status' => trans('status.ok'),
                    'msg' => trans('product.msg.reviewSucc'),
                ],
            ]);
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->with(['flash-msg' => [
                'status'=> trans('status.ok'),
                'msg' => $e->getMessage(),
                ],
            ]);
        }
    }
}
