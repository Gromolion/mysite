@extends('auth.admin.layouts.default')
@section('title', 'Продукты')

@section('content')
    <h1>Продукты</h1>
    <table class="table">
        <thead>
        <tr>
            <td>#</td>
            <td>Категория</td>
            <td>Название</td>
            <td>Код</td>
            <td>Действия</td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->code }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product) }}" method="post">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-success"><i class="bi bi-search"></i></a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('products.create') }}" class="btn btn-success">Добавить продукт</a>
@endsection
