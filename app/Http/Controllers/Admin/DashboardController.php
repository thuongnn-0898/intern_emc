<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    public function index()
    {
        $orders = Order::with('user', 'orderDetails')->orderBy('status')->paginate(5);
        return view('admin.dashboard', compact('orders'));
    }
}
