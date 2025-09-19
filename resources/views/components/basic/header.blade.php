<header>
    <a href="/">ГЛАВНАЯ</a>

    @auth
        <a href="/dashboard">Личный кабинет</a>
        <a href="/logout">Выйти из системы</a>
    @endauth

    @guest
        <a href="/auth">ВОЙТИ В СИСТЕМУ</a>
    @endguest
</header>