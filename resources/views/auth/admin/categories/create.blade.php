@extends('auth.admin.layouts.default')

@isset($category)
    @section('title', 'Редактировать категорию '.$category->name)
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')
    @isset($category)
        <h1>{{ $category->name }}</h1>
    @else
        <h1>Добавить категорию</h1>
    @endisset
    <form method="post"
          @isset($category)
              action="{{ route('categories.update', $category) }}"
          @else
              action="{{ route('categories.store') }}"
        @endisset>
        @csrf
        @isset($category)
            @method('PUT')
        @endisset
        <div class="row align-items-center">
            <div class="col-1">
                <label for="code">Код:</label>
            </div>
            <div class="col-6">
                <input type="text" id="code" name="code" class="form-control"
                       @isset($category)value="{{ $category->code }}"@endisset>
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-1">
                <label for="name">Название:</label>
            </div>
            <div class="col-6">
                <input type="text" id="name" name="name" class="form-control"
                       @isset($category)value="{{ $category->name }}"@endisset>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
                <label for="description">Описание:</label>
            </div>
            <div class="col-6">
                <textarea name="description" id="description" cols="60" rows="5">@isset($category){{ $category->description }}@endisset</textarea>
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
