@extends('auth.admin.layouts.default')
@section('title', 'Заказ №'.$order->id)

@section('content')
    <h1>Заказ №{{ $order->id }}</h1>
    <p>Имя заказчика: {{ $order->name }}</p>
    <p>Телефон: {{ $order->phone }}</p>
    @if (!is_null($order->getUser()))
        <p>Id пользователя: {{ $order->getUser()->id }}</p>
        <p>Email: {{ $order->getUser()->email }}</p>
    @endif
    <p>Стоимость: {{ $order->cost() }}</p>
    <h3 class="text-center">Продукты</h3>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Категория</td>
                <td>Название</td>
                <td>Изображение</td>
                <td>Кол-во</td>
                <td>Стоимость</td>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a>
                    </td>
                    <td><img src="{{ Storage::url($product->image) }}" height="56px" alt=""></td>
                    <td>{{ $product->pivot->count }}</td>
                    <td>{{ $product->price * $product->pivot->count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
