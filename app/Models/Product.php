<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'code', 'name', 'description', 'image', 'price'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
