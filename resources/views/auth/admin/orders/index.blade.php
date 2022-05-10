@extends('auth.admin.layouts.default')
@section('title', 'Заказы')

@section('content')
    <h1>Заказы</h1>
    @if (session()->has('warning'))
        <p class="alert alert-warning text-center">{{ session()->get('warning') }}</p>
    @endif
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>id Пользователя</td>
                <td>Имя</td>
                <td>Телефон</td>
                <td>Когда отправлен</td>
                <td>Сумма</td>
                <td>Действия</td>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->updated_at->format('H:i d/m/Y') }}</td>
                <td>{{ $order->cost() }}₽</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('orders.show', $order) }}" type="button" class="btn btn-success"><i class="bi bi-search"></i></a>
                        <a href="{{ route('orders.edit', $order) }}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('orders.destroy', $order) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger"
                                    href=""><span class="bi bi-trash" aria-hidden="true"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
