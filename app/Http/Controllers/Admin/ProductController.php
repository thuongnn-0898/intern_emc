<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\ImageDetail;
use App\Repositories\ProductRepository;
use App\Services\HandleImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->product->with('category')->paginate(\Config::get('settings.perPage'));

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $cates = Category::all();

        return view('admin.product.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $datas = $request->all();
        $service = new HandleImageService($request);
        $datas['image'] = $service->excute();
        if($product = $this->product->create($datas)){
            if(isset($datas['options']))
                $product->option()->create($request->all());
            if(isset($datas['images'])){
                foreach ($datas['images'] as $image){
                    $img_name = $service->handleImage($image);
                    $product->imageDetails()->create(['image' => $img_name]);
                }
            }
        }

        return $this->redirectHandle('product.index', trans('status.ok'), trans('product.msg.createSuss'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with('option', 'imageDetails')->getById($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $cates = Category::all();
        $product = $this->product->with('option')->getById($id);

        return view('admin.product.edit', compact(['cates', 'product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $datas = $request->all();
            $service = new HandleImageService($request, $this->product->getById($id));
            if($request->hasFile('image')){
                $datas['image'] = $service->excute();
            }
            if($product = $this->product->updateById($id, $datas)){
                $product->option()->delete();
                if(isset($datas['options']))
                    $product->option()->create($request->all());
                if(isset($datas['images'])){
                    $oldImgDetailIds = [];
                    foreach ($datas['images'] as $image){
                        if(is_array($image)){
                            array_push($oldImgDetailIds, $image['_destroy']);
                        }else{
                            $img_name = $service->handleImage($image);
                            $product->imageDetails()->create(['image' => $img_name]);
                        }
                    }
                    if(count($oldImgDetailIds) > 0){
                        $images = ImageDetail::byIds($oldImgDetailIds)->pluck('image')->toArray();
                        $service->handleOldImage($images);
                        ImageDetail::destroy($oldImgDetailIds);
                    }
                }
            }
            DB::commit();

            return redirect()->back()
                             ->with([
                                'flash-msg' => [
                                    'status' => trans('status.ok'),
                                    'msg'    => trans('product.msg.updateSuss')
                                ],
                            ]);
        }
        catch (\Exception $e){
            DB::rollback();

            return back()->withInput()->with([
                'flash-msg' => [
                    'status' => trans('status.caut'),
                    'msg'    => trans('product.msg.updateFail')
                ],
            ]);;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $product = $this->product->getById($id);
            $service = new HandleImageService($id, $product);
            $service->handleOldImage($product->image);
            $imgDetails = $product->imageDetails()->pluck('image')->toArray();
            $service->handleOldImage($imgDetails);
            $product->delete();

            return response()->json(['status' => true, 'msg' => trans('product.msg.destroySuss')]);
        }catch (\Exception $e){

            return response()->json(['status' => false, 'msg' => trans('product.msg.destroyerr')]);
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new ProductsImport,request()->file('file'));
        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $errors = [];
            foreach ($e->failures() as $error){
                array_push($errors, $error->toArray());
            }
            return redirect()->back()->withErrors($errors);
        }catch(\Maatwebsite\Excel\Exceptions\NoTypeDetectedException $e){

            return redirect()->back()->withErrors(trans('product.msg.typeInvalid'));
        }
    }
}
