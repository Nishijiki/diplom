<header>
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Логотип">
    </div>
    <form>
        <div class="search-container">
            <input type="text" placeholder="Что то..." id="search" class="search-input">
            <button type="button" class="clear-button">X</button>
            <button type="submit" class="search-button">
                <img src="{{ asset('img/search.png') }}" width="10px" height="10px">
            </button>
        </div>
    </form>
    <div class="buttons">
        <a href="{{ url('/submit-request') }}">
            <button><i class="fas fa-bullhorn"></i> Подать обращение</button>
        </a>
        <a href="{{ url('/investors') }}" style="color: white; text-decoration: none;">Инвесторам</a>

        @guest
            <a href="{{ url('/login') }}" style="color: white; text-decoration: none;">Вход</a>
            <a href="{{ url('/register') }}" style="color: white; text-decoration: none;">Регистрация</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="color: white; background: none; border: none; cursor: pointer;">
                    Выйти
                </button>
            </form>
        @endauth
    </div>
</header>
<nav>
    <ul>
        <li><a href="{{ url('/') }}">Главная</a></li>
        <li><a href="{{ url('/news') }}">Новости</a></li>
        <li><a href="{{ url('/search-document') }}">Поиск документа</a></li>
        <li><a href="{{ url('/personal-account') }}">Личный кабинет</a></li>
    </ul>
</nav>