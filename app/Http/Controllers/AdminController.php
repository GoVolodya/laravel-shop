<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function orders()
    {
        $orders = Order::where('status', 1)->get();
        return view('adminOrders', compact('orders'));
    }
}
