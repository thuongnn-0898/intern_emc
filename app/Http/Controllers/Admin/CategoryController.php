<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $cates = $this->category->with('childrenRecursive')->orderBy('parent_id')->paginate(\Config::get('settings.perPage'));

        return view('admin.category.index', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $cates = $this->category->all();

        return view('admin.category.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $cate = $this->category->create($request->all());

        return redirect()->route('category.index')->with(['flash-msg' => [
                'status'=> trans('status.ok'),
                'msg' => trans('category.createSucc'),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $cates = $this->category->all();
        try {
            $cate = $this->category->getById($id);
        }catch (\Exception $e){

            return redirect()
                ->route('category.index')
                ->with([
                    'flash-msg' => [
                        'status' => trans('status.caut'),
                        'msg'    => trans('category.notFound'),
                    ],
                ]);
        }

        return view('admin.category.edit', compact('cate', 'cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $cate = $cate = $this->cateById($request, $id);
        $idsCate = Category::getChildren($cate);
        array_push($idsCate, $cate->id);
        if(in_array((int)$request->parent_id, $idsCate, true))

            return redirect()
                ->route('category.edit', $id)
                ->with([
                    'flash-msg' => [
                        'status' => trans('status.fail'),
                        'msg'    => trans('category.failChild'),
                    ],
                ]);
        $this->category->updateById($id, $request->all());

        return redirect()->route('category.index')->with([
            'flash-msg' => [
                'status' => trans('status.ok'),
                'msg'    => trans('category.updateSucc'),
            ],
        ]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $req, $id)
    {
        $cate = $this->cateById($req, $id);
        $idsCate = Category::getChildren($cate);
        array_push($idsCate, $cate->id);
        $this->category->deleteMultipleById($idsCate);

        return $this->redirectHandle('category.index', trans('status.ok'), trans('category.destroySucc'));
    }

    private function cateById($req, $id){
        try {
            $cate = $this->category->getById($id);
        }catch (\Exception $e){
            if($req->ajax())

                return response()->json(['status' => 'success']);

            return redirect()
                ->route('category.index')
                ->with([
                    'flash-msg' => [
                        'status' => trans('status.fail'),
                        'msg'    => trans('category.notFound'),
                    ],
                ]);
        }
        return $cate;
    }
}
