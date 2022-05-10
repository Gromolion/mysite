@extends('auth.admin.layouts.default')
@section('title', 'Заказ №'.$order->id)

@section('content')
    <h1>Заказ №{{ $order->id }}</h1>
    <p>id Пользователя: {{ $order->user_id }}</p>
    <p>Имя пользователя: {{ $order->name }}</p>
    <p>Телефон: {{ $order->phone }}</p>
    @if (!is_null($user))
        <p>Email: {{ $user->email }}</p>
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
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ $product->image }}" height="56px" alt=""></td>
                    <td>{{ $product->pivot->count }}</td>
                    <td>{{ $product->price * $product->pivot->count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="btn-wrapper text-center">
        <a href="{{ route('orders.edit', $order) }}" class="btn btn-success">Редактировать</a>
    </div>
@endsection
