<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use GuzzleHttp\Psr7\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('auth.admin.orders.index', compact('orders'));
    }

    public function destroy($order_id) {
        Order::destroy($order_id);
        return redirect()->route('orders.index');
    }

    public function show($order_id) {
        $order = Order::find($order_id);
        if (!is_null($order)) {
            $products = $order->products;
            $user = $order->getUser();
            return view('auth.admin.orders-show', compact('order', 'user', 'products'));
        } else {
            session()->flash('warning', 'Такого заказа не существует');
            return redirect()->route('auth.admin.orders');
        }
    }

    public function edit($order_id)
    {
        $order = Order::find($order_id);
        if (!is_null($order)) {
            $products = $order->products;
            $user = $order->getUser();
            return view('auth.admin.orders-edit', compact('order', 'user', 'products'));
        } else {
            session()->flash('warning', 'Такого заказа не существует');
            return redirect()->route('orders.index');
        }
    }

    public function editAccept($order_id, Request $request)
    {
        $order = Order::find($order_id);
        if (!is_null($order)) {
            $order->user_id = $request->user_id;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->save();
        } else {
            session()->flash('warning', 'Такого заказа не существует');
        }
        return redirect()->route('orders.index');
    }
}
