@extends('auth.admin.layouts.default')

@section('content')
    <h1>Добавить категорию</h1>
    <form action="{{ route('categories.update') }}" method="post">
        @csrf
        <div class="row align-items-center">
            <div class="col-1">
                <label for="code">Код:</label>
            </div>
            <div class="col-6">
                <input type="text" id="code" name="code" class="form-control">
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-1">
                <label for="name">Название:</label>
            </div>
            <div class="col-6">
                <input type="text" id="name" name="name" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
                <label for="description">Описание:</label>
            </div>
            <div class="col-6">
                <textarea name="description" id="description" cols="60" rows="5"></textarea>
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-1">
                <label for="image">Картинка:</label>
            </div>
            <div class="col-6">
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
@endsection
