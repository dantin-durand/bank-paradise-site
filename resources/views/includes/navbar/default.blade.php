<nav class="navbar-default__container">
    <a href="/"><img src="/img/logo-white.svg" alt="logo bank-paradise"></a>
    <div>
        <div class="navbar__burger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="navbar__items">
            <ul>
                <li><a href="/services">Services</a></li>
                <li><a href="/news">News</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <ul>
                <li><a href="{{ route('login') }}">Conexion</a></li>
                <li><a href="{{ route('register') }}">Inscription</a></li>
            </ul>
        </div>
    </div>
</nav>