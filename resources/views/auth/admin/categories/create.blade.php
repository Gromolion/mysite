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
    <form method="post" enctype="multipart/form-data"
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
                @error('code')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <input type="text" id="code" name="code" class="form-control"
                       value="{{ old('code', isset($category) ? $category->code : null)}}">
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-1">
                <label for="name">Название:</label>
            </div>
            <div class="col-6">
                @error('name')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <input type="text" id="name" name="name" class="form-control"
                       value="{{ old('name', isset($category) ? $category->name : null)}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
                <label for="description">Описание:</label>
            </div>
            <div class="col-6">
                @error('description')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <textarea name="description" id="description" cols="50" rows="5">{{ old('description', isset($category) ? $category->description : null)}}</textarea>
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
