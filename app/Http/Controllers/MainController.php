<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function categories() {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code) {
        $category = Category::where('code', $code)->first();
        $category_id = $category->id;
        $products = Product::where('category_id', $category_id)->get();
        return view('category', compact('category', 'products'));
    }

    public function product($category_code, $product_code) {
        $category = Category::where('code', $category_code)->first();
        $product = Product::where('code', $product_code)->first();
        return view('product', compact('product', 'category'));
    }

    public function basket() {
        return view('basket');
    }

    public function order() {
        return view('order');
    }
}
