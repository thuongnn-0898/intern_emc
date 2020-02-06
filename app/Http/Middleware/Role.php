<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Auth;
use Illuminate\Support\Facades\View;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
            return redirect('login');

        $user = Auth::user();

        if($user->isAdmin()){
            $orders_noti = Order::isPending()->orderBy('created_at', 'desc')->get();
            View::share('orders_noti', $orders_noti);

            return $next($request);
        }else{

            return redirect('/')->with(['flash-msg' => [
                'status'=> trans('status.caut'),
                'msg' =>  trans('status.accDenied'),
                ],
            ]);;
        }
    }
}
