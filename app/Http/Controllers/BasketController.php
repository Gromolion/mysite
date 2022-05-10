<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket() {
        $order_id = session('order_id');
        if (!is_null($order_id)) {
            $order = Order::find($order_id);
            if(Auth::check() and !is_null($order->user_id)) {
                $order->user_id = Auth::id();
                $order->save();
            }
            return view('basket', compact('order'));
        }
        else {
            return view('basket');
        }

    }

    public function basketOrder() {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('index');
        }
        $order = Order::find($order_id);
        return view('basket-order', compact('order'));
    }

    public function basketAdd($product) {
        $order_id = session('order_id');
        if(is_null($order_id)) {
            $order = Order::create();
            session(['order_id' => $order->id]);
        } else {
            $order = Order::find($order_id);
        }

        if ($order->products->contains($product)) {
            $pivot = $order->products()->where('product_id', $product)->first()->pivot;
            $pivot->count++;
            $pivot->update();
        } else {
            $order->products()->attach($product);
        }

        $product_name = Product::where('id', $product)->first()->name;
        session()->flash('productAdded', "Добавлен товар $product_name");
        return redirect()->route('basket');
    }

    public function basketRemove($product)
    {
        $order_id = session('order_id');
        $order = Order::find($order_id);
        $pivot = $order->products()->where('product_id', $product)->first()->pivot;
        if ($pivot->count > 1) {
            $pivot->count--;
            $pivot->update();
        } else {
            $order->products()->detach($product);
        }
        $product_name = Product::where('id', $product)->first()->name;
        session()->flash('productDeleted', "Удален товар $product_name");
        return redirect()->route('basket');
    }

    public function basketAccept(Request $request)
    {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('index');
        }
        $order = Order::find($order_id);
        $result = $order->saveOrder($request->name, $request->phone);
        if ($result) {
            session()->flash('result', 'Ваш заказ принят в обработку');
        }
        return redirect()->route('index');
    }
}
