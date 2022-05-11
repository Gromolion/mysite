<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('auth.admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('auth.admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        Order::destroy($order);
        return redirect()->route('orders.index');
    }
}
