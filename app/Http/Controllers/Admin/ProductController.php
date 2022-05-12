<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('auth.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('auth.admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $params = $request->all();
        if (!is_null($request->image)) {
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if (!isset($params[$field])) {
                $params[$field] = 0;
            }
        }

        Product::create($params);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('auth.admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('auth.admin.products.create', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param ProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        if (!is_null($request->image)) {
            Storage::delete($product->image);
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if (!isset($params[$field])) {
                $params[$field] = 0;
            }
        }

        $product->update($params);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
