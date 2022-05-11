<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-2 px-4">
        <div class="container">
            <a href="{{ route('index')}}" class="navbar-brand">Вернуться на сайт</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}" class="nav-link">Заказы</a>
                    </li>
                </ul>

            </div>
            <div class="profile">
                <ul class="navbar-nav">
                    @if (Auth::user()->isAdmin())
                        <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link">Админ-панель</a></li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('basket') }}" class="nav-link"><i class="bi bi-basket"></i> Корзина</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button id="navbarDropdown" class="btn nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
