<?php

namespace App\Http\Controllers;

use App\Enums\SuggestStatus;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SuggestRequest;
use App\Mail\SuggestMail;
use App\Mail\UserOrder;
use App\Models\Order;
use App\Models\Suggest;
use App\Repositories\ProductRepository;
use App\Repositories\SuggestRepository;
use App\Services\HandleImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class SuggestController extends Controller
{
    protected $suggest;
    protected $product;

    public function __construct(SuggestRepository $sugg, ProductRepository $product)
    {
        $this->suggest = $sugg;
        $this->product = $product;
    }

    public function index()
    {
        if(!Auth::user()->isAdmin()){
            $suggests = Auth::user()->suggests()->paginate(5);
        }else{
            $suggests = Suggest::with('user')->paginate(5);
        }
        return view('suggest.index', compact('suggests'));
    }

    public function create()
    {
        return view('suggest.create');
    }

    public function store(SuggestRequest $req)
    {
        Auth::user()->suggests()->create($req->all());
        return redirect()->route('suggest.index');
    }

    public function update(Request $req, $id)
    {
        $item = $this->suggest->updateById($id, ['status' => $req->type]);
        return view('suggest._suggest', compact('item'));
    }

    public function accept($id)
    {
        if (Gate::allows('accept-suggest')) {
            $suggest = $this->suggest->getById($id);
            return view('suggest.accept', compact('suggest'));
        }
        abort(403);
    }

    public function handing(ProductRequest $req, $suggest_id)
    {
        if (Gate::allows('accept-suggest')) {
            $datas = $req->all();
            $service = new HandleImageService($req);
            $datas['image'] = $service->excute();
            if($product = $this->product->create($datas)){
                if(isset($datas['options']))
                    $product->option()->create($req->all());
                if(isset($datas['images'])){
                    foreach ($datas['images'] as $image){
                        $img_name = $service->handleImage($image);
                        $product->imageDetails()->create(['image' => $img_name]);
                    }
                }
            }
            $suggest = $this->suggest->getById($suggest_id);
            $suggest->update(['status' => SuggestStatus::Accepted]);
            if($req->all()['sendMail']){
                Mail::to(Auth::user())->later(now(), new SuggestMail($suggest));
            }
            return $this->redirectHandle('suggest.index', trans('status.ok'), trans('product.msg.createSucc'));
        }
        abort(403);
    }
}
