<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
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
            $this->save();
            session()->forget('order_id');
            return True;
        } else {
            return false;
        }
    }
    use HasFactory;
}
