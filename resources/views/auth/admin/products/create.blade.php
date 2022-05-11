@extends('auth.admin.layouts.default')

@isset($product)
    @section('title', 'Редактировать продукт '.$product->name)
@else
    @section('title', 'Создать продукт')
@endisset

@section('content')
    @isset($product)
        <h1>{{ $product->name }}</h1>
    @else
        <h1>Добавить продукт</h1>
    @endisset
    <form method="post" enctype="multipart/form-data"
          @isset($product)
              action="{{ route('products.update', $product) }}"
          @else
              action="{{ route('products.store') }}"
        @endisset>
        @csrf
        @isset($product)
            @method('PUT')
        @endisset
        <div class="row align-items-center">
            <div class="col-1">
                <label for="code">Код:</label>
            </div>
            <div class="col-6">
                @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" id="code" name="code" class="form-control"
                       value="{{ old('code', isset($product) ? $product->code : null)}}">
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-1">
                <label for="name">Название:</label>
            </div>
            <div class="col-6">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" id="name" name="name" class="form-control"
                       value="{{ old('name', isset($product) ? $product->name : null)}}">
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-1">
                <label for="category_id">Категория:</label>
            </div>
            <div class="col-6">
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @isset($product)
                                    @if($category->id === $product->category->id) selected
                                    @endif
                                @endisset
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1">
                <label for="description">Описание:</label>
            </div>
            <div class="col-6">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea name="description" id="description" cols="50" rows="5">{{ old('description', isset($product) ? $product->description : null)}}</textarea>
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-1">
                <label for="price">Цена:</label>
            </div>
            <div class="col-6">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" id="price" name="price" class="form-control"
                       value="{{ old('price', isset($product) ? $product->price : null)}}">
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
