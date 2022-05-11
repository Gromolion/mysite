<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }

    public function cost()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->price * $product->pivot->count;
        }
        return $sum;
    }
    public function saveOrder($name, $phone)
    {
        if ($this->status == 0) {
            $this->status = 1;
            $this->name = $name;
            $this->phone = $phone;
            $this->cost = $this->cost();
            if (!is_null(Auth::user())) {
                $this->user_id = Auth::user()->id;
            }
            $this->save();
            session()->forget('order_id');
            return True;
        } else {
            return false;
        }
    }
    use HasFactory;
}
