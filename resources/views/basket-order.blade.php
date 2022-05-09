@extends('layouts.default')
@section('title', 'Оформить заказ')

@section('content')
    <div class="text-center">
        <h1>Подтвердите заказ</h1>
        <p>Общая стоимость заказа: <b>{{ $order->cost() }}₽</b></p>
        <p>Укажите свое имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>
        <form action="{{ route('basket-accept') }}" method="post" class="form">
            @csrf
            <div class="row g-3 justify-content-around">
                <div class="col-6">
                    <input class="form-control col-5" type="text" name="name" placeholder="Введите имя">
                </div>
                <div class="col-6">
                    <input class="form-control col-5" type="text" name="phone" placeholder="Введите номер телефона">
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Подтвердить</button>
        </form>
    </div>
@endsection
