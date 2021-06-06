@props(['activePage'])

<nav class="account__navbar-admin card">
    <ul>
        <li><a href="/admin/users" class="{{ $activePage === 'users' ? 'active' : ''}}">Liste des utilisateurs</a></li>
        <li><a href="/admin/news" class="{{ $activePage === 'news' ? 'active' : ''}}">Actualités</a></li>
        <li><a href="/account">Compte</a></li>
    </ul>
</nav>