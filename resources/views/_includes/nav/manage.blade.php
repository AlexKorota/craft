<div class="side-menu">
<aside class="menu m-t-30 m-l-20">
    <p class="menu-label">General</p>
    <ul class="menu-list">
        <li><a href="{{route('manage.dashboard')}}">Панель управления</a></li>
    </ul>
    <p class="menu-label">
        Администрирование
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('users.index') }}">Пользователи</a></li>
        <li><a href="#">Роли и права</a>
            <ul>
                <li><a href="{{ route('roles.index') }}">Роли</a></li>
                <li><a href="{{ route('permissions.index') }}">Права (разрешения)</a></li>
            </ul>
        </li>
    </ul>
</aside>
</div>