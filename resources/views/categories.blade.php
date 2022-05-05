@extends('layouts.default')
@section('title', 'Категории')

@section('content')
    <h1 class="text-center mb-4">Категории</h1>
    <div class="row ">
        @foreach($categories as $category)
                <div class="card mx-auto col-sm-12 col-md-6 col-xl-4 col-xxl-3 p-3">
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
