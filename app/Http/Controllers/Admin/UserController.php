<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Services\HandleImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->user->getUser()->paginate(\Config::get('settings.perPage'));

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $datas = $request->all();
            if($request->hasFile('image')){
                $service = new HandleImageService($request, null, 'avatars');
                $datas['profile']['avatar'] = $service->excute();
            }
            $user = $this->user->create($datas);
            if ($user && $datas['profile'])
                $user->profile()->create($datas['profile']);
            DB::commit();

            return $this->redirectHandle('user.index', trans('status.ok'), trans('user.msg.createSucc'));
        }catch (\Exception $e){
            DB::rollBack();

            return back()->withInput()->with([
                'flash-msg' => [
                    'status' => trans('status.ok'),
                    'msg' => trans('user.msg.createFail')
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
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->user->with('profile')->getById($id);
        if(Auth::user()->cant('edit', $user))
            abort(403);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->getById($id);
            $datas = $request->all();
            $detail = $user->profile()->first();
            if($request->hasFile('image')){
                $service = new HandleImageService($request, null, 'avatars');
                $datas['profile']['avatar'] = $service->excute();
                if($user->profile->avatar ?? false)
                    $service->handleOldImage($user->profile->avatar);
            }
            $update = $this->user->updateById($id, $datas);
            if ($update && $datas['profile'])
                if($detail == null){
                    $user->profile()->create($datas['profile']);
                }else{
                    $detail->update($datas['profile']);
                }
            DB::commit();

            return redirect()->back()->with([
                'flash-msg' => [
                    'status' => trans('status.ok'),
                    'msg' => trans('user.msg.updateSucc'),
                ],
            ]);
        }catch (\Exception $e){
            DB::rollBack();

            return back()->withInput()->with([
                'flash-msg' => [
                    'status' => trans('status.ok'),
                    'msg' => trans('user.msg.updateFail')
                ],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->getById($id);
            $this->authorize('destroy', $user);
            if($user->profile->avatar ?? false){
                $service = new HandleImageService($id, $user, 'avatars');
                $service->handleOldImage($user->profile->avatar);
            }
            $user->delete();
            DB::commit();

            return response()->json(['status' => true, 'msg' => trans('user.msg.destroySucc')]);
        }catch (\Exception $e){

            DB::rollBack();

            return response()->json(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function active($id, $status)
    {
        try {
            $user = $this->user->getById($id);
            $user->update(['status' => !(int)$status]);

            return response()->json(['status' => true, 'msg' => trans('user.msg.handing')]);
        }catch (\Exception $e){

            return response()->json(['status' => false, 'msg' => trans('user.msg.notFound')]);
        }
    }
}
