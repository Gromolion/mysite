@extends('layouts.default')
@section('title', $category->name)

@section('content')
    <h1 class="text-center mb-3">{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
    <div class="row ">
        @foreach($products as $product)
            <div class="card mx-auto col-sm-12 col-md-6 col-xl-4 col-xxl-3 p-3">
                <div class="panel-body mx-auto">
                    <a class="text-decoration-none" href="{{ route('product', [$category->code, $product->code]) }}">
                        <img class="card-img-top col-12" src="{{ $product->image }}" alt="">
                        <h2 class="card-title text-center">{{ $product->name }}</h2>
                    </a>
                    <p class="card-text text-center">{{ $category->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
