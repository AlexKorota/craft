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
        <li><a href="{{ route('users.index') }}">Управление пользователями</a></li>
        <li><a href="{{ route('permissions.index') }}">Роли и права</a></li>
    </ul>
</aside>
</div>