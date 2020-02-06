<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Services\HandleUserService;
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

    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->paginate(\Config::get('settings.perPage'));
        return view('guest.users.index', compact('orders'));
    }

    public function show(Request $request, $id)
    {
        if($request->ajax()){
            return response()->json([trans('status.ok') => true, 'data' => Auth::user()]);
        }else{

            return view('guest.users.show');
        }
    }

    public function edit($id)
    {
        $user = $this->user->with('profile')->getById($id);
        if($user->cant('edit', $user))

            return redirect()->back()->with(['flash-msg' => [
                'status' => trans('status.caut'),
                'msg'    => trans('admin.accessDenied')],
                ]);
        return view('guest.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->getById($id);
            $service = new HandleUserService($user, $request);
            $service->updateUser();
            DB::commit();

            return redirect()->back()->with([
                'flash-msg' => [
                    'status' => trans('status.ok'),
                    'msg'    => trans('user.msg.updateSucc')
                ],
            ]);
        }catch (\Exception $e){
            dd($e->getMessage());
            DB::rollBack();

            return back()->withInput();
        }
    }

    public function upload(Request $request)
    {
        return response()->json(['data'=>true]);
    }
}

