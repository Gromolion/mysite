@extends('layouts.default')
@section('title', $category->name)

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>
    <h1 class="text-center mb-3">{{ $category->name }}</h1>
    <div class="row d-flex justify-content-center text-center">
        @foreach($category->products as $product)
            <div class="card m-3 col-3 p-3">
                <div class="panel-body mx-auto">
                    <a class="text-decoration-none link-dark" href="{{ route('product', [$category->code, $product->code]) }}">
                        <img class="card-img-top col-12" width="278" height="278" src="{{ $product->image }}" alt="">
                        <h3 class="card-title text-center">{{ $product->name }}</h3>
                    </a>
                    <p class="text-center fs-4 ">{{ $product->price }}₽</p>
                    <div class="button-wrapper d-flex justify-content-between mx-3">
                        <form action="{{ route('basket-add', $product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">В корзину</button>
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-outline-secondary">Подробнее</a>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
