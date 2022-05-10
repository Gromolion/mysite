@extends('auth.admin.layouts.default')
@section('title', 'Категории')

@section('content')
    <h1>Категории</h1>
    <table class="table">
        <thead>
        <tr>
            <td>#</td>
            <td>Название</td>
            <td>Кол-во товаров</td>
            <td>Код</td>
            <td>Описание</td>
            <td>Действия</td>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->products()->count() }}</td>
                <td>{{ $category->code }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-success"><i class="bi bi-search"></i></a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить категорию</a>
@endsection
