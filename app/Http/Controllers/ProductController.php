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
        $filter = [];
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
            ->orderBy('price', $filter['orderBy'] ?? 'desc')
            ->paginate($filter['per'] ?? \Config::get('settings.perProduct')[0]);
        return view('guest.product.index', compact(['products', 'cates']));

    }

    private function filter($req){
        if(isset($req['category_ids'])){
            $idsCate = $req['category_ids'];
            foreach ($idsCate as $id){
                $cate = Category::findOrFail($id);
                $ids = Category::getChildren($cate);
                foreach ($ids as $id){
                    array_push($idsCate, $id);
                }
            }
        }else{
            if(isset($req['category_id'])){
                $cate = Category::findOrFail($req['category_id']);
                $a = new Category;
                $idsCate = $a->getChildren($cate);
                array_push($idsCate, $cate->id);
            }
        }
        return [
            'per' => $req['perPage'] ?? 9,
            'category_id' => $idsCate ?? '',
            'orderBy' => $req['orderBy'] ?? 'desc',
            'priceFrom' => $req['priceFrom'] ?? 1,
            'priceTo' => $req['priceTo'] ?? Product::max('price'),
        ];
    }

}
