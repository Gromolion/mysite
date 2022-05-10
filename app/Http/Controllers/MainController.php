<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('index', compact('products'));
    }

    public function categories() {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('categories', compact('categories'));
    }

    public function category($code) {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category_code, $product_code) {
        $category = Category::where('code', $category_code)->first();
        $product = Product::where('code', $product_code)->first();
        return view('product', compact('product', 'category'));
    }
}
