@extends('layouts.default')
@section('title', 'Главная страница')

@section('content')
    @if (session()->has('result'))
        <p class="alert alert-success text-center">{{ session()->get('result') }}</p>
    @endif
    @if (session()->has('basket-empty'))
        <p class="alert alert-success text-center">{{ session()->get('basket-empty') }}</p>
    @endif
    <h2 class="text-center">Все товары</h2>
    <div class="row d-flex justify-content-center">
        @foreach($products as $product)
            <div class="card m-3 col-3 p-3">
                <div class="panel-body mx-auto">
                    <a class="text-decoration-none link-dark"
                       href="{{ route('product', [$product->category->code, $product->code]) }}">
                        <img class="card-img-top col-12" width="278" height="278" src="{{ Storage::url($product->image) }}" alt="">
                        <h3 class="card-title text-center">{{ $product->name }}</h3>
                    </a>
                    <p class="text-center fs-4 ">{{ $product->price }}₽</p>
                    <div class="button-wrapper d-flex justify-content-between mx-3">
                        <form action="{{ route('basket-add', $product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">В корзину</button>
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                               class="btn btn-outline-secondary">Подробнее</a>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
