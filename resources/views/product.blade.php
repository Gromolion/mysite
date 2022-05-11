@extends('layouts.default')
@section('title', $product->name)

@section('head')
    <link rel="stylesheet" href="/css/product.css">
@endsection

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category', $category->code) }}">{{ $category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>
    <div class="row">
        <img class="img-thumbnail col-4" src="{{ Storage::url($product->image) }}" alt="">
        <div class="col-8">
            <h1 class="text-center mb-3">{{ $product->name }}</h1>
            <div class="row mx-2 justify-content-center">
                <button type="button" class="fs-2 btn col-3 btn-outline-primary" disabled>{{ $product->price }}₽</button>
                <a href="" class="col-4 text-center align-self-center">Нашли дешевле?</a>
                <form class="buttons my-5 col-10 d-flex justify-content-around"
                      action="{{ route('basket-add', $product) }}" method="post">
                    @csrf
                    <button type="submit" class="col-5 btn btn-primary">В корзину</button>
                    <button class="col-5 btn btn-primary">Купить в один клик</button>
                </form>
                <div class="other-buttons row">
                    <div class="col-3 text-center">
                        <a href="" class="flex-col">
                            <i class="bi bi-hand-thumbs-up col-12"></i>
                            <p>Качество</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="">
                            <i class="bi bi-truck text-center"></i>
                            <p>Доставка</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="">
                            <i class="bi bi-cash text-center"></i>
                            <p>Оплата</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="">
                            <i class="bi bi-arrow-down-up text-center"></i>
                            <p>Обмен</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="p-5">{{ $product->description }}</p>
@endsection
