@extends('auth.admin.layouts.default')
@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <table class="table">
        <thead>
        <tr>
            <td>Поле</td>
            <td>Значение</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <td>Код</td>
            <td>{{ $product->code }}</td>
        </tr>
        <tr>
            <td>Название</td>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <td>Описание</td>
            <td>{{ $product->description }}</td>
        </tr>
        <tr>
            <td>Изображение</td>
            <td><img src="{{ Storage::url($product->image) }}" height="120px" alt=""></td>
        </tr>
        <tr>
            <td>Цена</td>
            <td>{{ $product->price }}</td>
        </tr>
        </tbody>
    </table>
@endsection
