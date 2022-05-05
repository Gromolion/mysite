@extends('layouts.default')
@section('title', $product->name)

@section('head')
    <link href="product.css">
@endsection

@section('content')
    <div class="row">
        <img class="img-thumbnail col-4" src="{{ $product->image }}" alt="">
        <div class="col-8">
            <h1 class="text-center mb-3">{{ $product->name }}</h1>
            <div class="row mx-2 justify-content-center">
                <p class="fs-2 col-3 text-center p-2 m-0" style="background-color: #0c63e4; border-radius: 5px; color: white;">{{ $product->price }}₽</p>
                <a href="" class="col-6 text-center align-self-center">Нашли дешевле?</a>
                <div class="buttons mt-5 col-10 d-flex justify-content-around">
                    <button class="col-5">В корзину</button>
                    <button class="col-5">Купить в один клик</button>
                </div>
                <div class="other-buttons row">
                    <div class="col-3">
                        <a href="">
                            <i class="bi bi-hand-thumbs-up text-center"></i>
                            <span>Качество</span>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="">
                            <i class="bi bi-hand-thumbs-up text-center"></i>
                            <span>Качество</span>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="">
                            <i class="bi bi-hand-thumbs-up text-center"></i>
                            <span>Качество</span>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="">
                            <i class="bi bi-hand-thumbs-up text-center"></i>
                            <span>Качество</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="p-5">{{ $product->description }}</p>
@endsection
