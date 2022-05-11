<?php

namespace App\Http\Controllers\Person;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function orders()
    {
        $orders = Auth::user()->orders;
        return view('auth.person.orders', compact('orders'));
    }
}
