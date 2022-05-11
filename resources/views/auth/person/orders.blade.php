@extends('layouts.default')
@section('title', 'Мои заказы')
    
@section('content')
    <h1>Мои заказы</h1>
    @foreach ($orders as $order)
        <h2 class="text-center">Заказ №{{ $order->id }}</h2>
        <h5 class="text-center">{{ $order->updated_at->format('H:i d/m/Y') }}</h5>
        <table class="table">
            <thead>
                <tr>
                    <td>Продукт</td>
                    <td>Изображение</td>
                    <td>Количество</td>
                    <td>Стоимость</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a></td>
                        <td><img src="{{ Storage::url($product->image) }}" height="90px" alt="{{ $product->name }}"></td>
                        <td>{{ $product->pivot->count }} шт.</td>
                        <td>{{ $product->price * $product->pivot->count }}₽</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость: </td>
                    <td>{{ $order->cost() }}₽</td>
                </tr>
            </tbody>
        </table>
    @endforeach
@endsection