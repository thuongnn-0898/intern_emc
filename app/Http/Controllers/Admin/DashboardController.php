<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Suggest;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::count(),
            'category' => Category::count(),
            'product' => Product::count(),
            'order' => Order::count(),
            'suggest' => Suggest::count(),
        ];
        $orders = Order::with('user', 'orderDetails')->orderBy('status')->paginate(\Config::get('settings.perPage'));
        return view('admin.dashboard', compact(['orders' , 'data']));
    }
}
