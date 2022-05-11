@extends('auth.admin.layouts.default')
@section('title', $category->name)

@section('content')
    <h1>{{ $category->name }}</h1>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Изображение</td>
                <td><img src="{{ Storage::url($category->image) }}" height="120px" alt=""></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $category->products()->count() }}</td>
            </tr>
        </tbody>
    </table>
@endsection
