<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-2 px-4">
    <div class="container">
        <a href="{{ route('index')}}" class="navbar-brand">Gromolion</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">Главная</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">Категории</a>
                </li>
            </ul>

        </div>
        <div class="profile">
            <ul class="navbar-nav">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endif
                @else
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
        </div>
        </li>
        @endguest
        </ul>
    </div>
    </div>
</nav>
