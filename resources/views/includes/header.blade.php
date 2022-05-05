<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-2 px-4">
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
            <li class="nav-item">
                <a href="#" class="nav-link">Войти</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Регистрация</a>
            </li>
        </ul>
    </div>
</nav>
