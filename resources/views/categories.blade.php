@extends('layouts.default')
@section('title', 'Категории')

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Все категории</li>
        </ol>
    </nav>
    <h1 class="text-center mb-4">Категории</h1>
    <div class="row d-flex justify-content-center">
        @foreach($categories as $category)
                <div class="card m-3 col-3 p-3">
                    <div class="panel-body mx-auto">
                        <a class="text-decoration-none" href="{{ route('category', $category->code) }}">
                            <img class="card-img-top" width="278px" height="278px" src="{{ $category->image }}" alt="">
                            <h2 class="card-title text-center">{{ $category->name }}</h2>
                        </a>
                        <p class="card-text text-center">{{ $category->description }}</p>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
