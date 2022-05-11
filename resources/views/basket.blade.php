@extends('layouts.default')
@section('title', 'Корзина')

@section('content')
    @if (session()->has('productAdded'))
        <p class="alert alert-success">{{ session()->get('productAdded') }}</p>
    @endif
    @if (session()->has('productDeleted'))
        <p class="alert alert-danger">{{ session()->get('productDeleted') }}</p>
    @endif
    <h1>Корзина</h1>
    @if (isset($order) and $order->products()->count() != 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                            <img src="{{ Storage::url($product->image) }}" height="56px" alt="">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>
                        <span class="badge bg-secondary">{{ $product->pivot->count }}</span>
                        <div class="btn-group">
                            <form action="{{ route('basket-remove', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                        href=""><span class="bi bi-dash" aria-hidden="true"></span></button>
                            </form>
                            <form action="{{ route('basket-add', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success"
                                        href=""><span class="bi bi-plus" aria-hidden="true"></span></button>
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->price }}₽</td>
                    <td>{{ $product->pivot->count * $product->price }}₽</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Общая стоимость:</td>
                <td>{{ $order->cost() }}₽</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-success"
               href="{{ route('basket-order') }}">Оформить заказ</a>
        </div>
    @else
        <p>Ваша корзина пуста</p>
    @endif
@endsection
