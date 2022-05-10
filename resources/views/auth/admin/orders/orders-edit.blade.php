@extends('auth.admin.layouts.default')
@section('title', 'Редактирование заказа №'.$order->id)

@section('content')
    <h1>Редактирование заказа №{{ $order->id }}</h1>
    <form action="{{ route('orders.edit-accept', $order->id) }}" method="post">
        @csrf
        @if (!is_null($order->user_id))
            <div class="row align-items-center">
                <div class="col-2">
                    <label for="user_id" class="form-label">id Пользователя:</label>
                </div>
                <div class="col-6">
                    <input id="user_id" name="user_id" class="form-control" type="text" value="{{ $order->user_id }}">
                </div>
            </div>
        @endif
        <div class="row align-items-center">
            <div class="col-2">
                <label for="name" class="form-label">Имя пользователя:</label>
            </div>
            <div class="col-6">
                <input type="text" id="name" name="name" class="form-control" value="{{ $order->name }}">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-2">
                <label for="phone" class="form-label">Телефон:</label>
            </div>
            <div class="col-6">
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $order->phone }}">
            </div>
        </div>
            <div class="row align-items-center">
                <p class="col-2">Email:</p>
                <p class="col-6">{{$user->email}}</p>
            </div>
        <div class="row align-items-center">
            <div class="col-2">
                <label for="cost" class="form-label">Стоимость:</label>
            </div>
            <div class="col-6">
                <input type="text" id="cost" name="cost" class="form-control" value="{{ $order->cost() }}">
            </div>
        </div>
        <br>
        <div class="btn-wrapper text-center">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="{{ route('orders.index') }}" class="btn btn-success">Редактировать продукты</a>
            <a href="{{ route('orders.index') }}" class="btn btn-danger">Отменить</a>
        </div>
    </form>
{{--    <h3 class="text-center">Продукты</h3>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <td>#</td>--}}
{{--            <td>Категория</td>--}}
{{--            <td>Название</td>--}}
{{--            <td>Изображение</td>--}}
{{--            <td>Кол-во</td>--}}
{{--            <td>Стоимость</td>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($products as $product)--}}
{{--            <tr>--}}
{{--                <td>{{ $product->id }}</td>--}}
{{--                <td>{{ $product->category->name }}</td>--}}
{{--                <td>{{ $product->name }}</td>--}}
{{--                <td><img src="{{ $product->image }}" height="56px" alt=""></td>--}}
{{--                <td>--}}
{{--                    <input type="number" min="0" max="99" name="product--count" class="form-control w-25" value="{{ $product->pivot->count }}">--}}
{{--                </td>--}}
{{--                <td>{{ $product->price * $product->pivot->count }}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
@endsection
