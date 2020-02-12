<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $q;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index(Request $req)
    {
        $cates = Category::all();
        $filter = [
            'per' => 9,
            'category_id' => '',
            'orderBy' => 'desc',
            'priceFrom' => 1,
            'priceTo' => 1000,
        ];

        if($req->q)
            $filter = $this->filter($req->q);
        $products = Product::where(function ($q) use($filter) {
            if (!empty($filter['category_id'])){
                $q->whereIn('category_id', $filter['category_id']);
            }
        })->where(function ($q) use($filter){
            if(!empty($filter['priceFrom']) && !empty($filter['priceTo'])){
                $q->whereBetween('price', [$filter['priceFrom'], $filter['priceTo']]);
            }
        })->with('category')
            ->orderBy('price', $filter['orderBy'])
            ->paginate($filter['per']);

        return view('guest.product.index', compact(['products', 'cates']));
    }

    private function filter($req){
        if(isset($req['category_ids'])){
            $idsCate = $req['category_ids'];
        }else{
            if(isset($req['category_id'])){
                $cate = Category::findOrFail($req['category_id']);
                $idsCate = Category::getChildren($cate);
                array_push($idsCate, $cate->id);
            }
        }

        return [
            'per' => $req['perPage'] ?? 9,
            'category_id' => $idsCate ?? '',
            'orderBy' => $req['orderBy'] ?? 'desc',
            'priceFrom' => $req['priceFrom'] ?? 1,
            'priceTo' => $req['priceTo'] ?? 1000,
        ];
    }

}
