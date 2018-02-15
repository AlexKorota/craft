<div class="side-menu">
<aside class="menu m-t-20 m-l-20">
    <p class="menu-label">
        Администрирование
    </p>
    <ul class="menu-list">
        <li><p>Посты</p>
            <ul>
                <li><a href="{{ route('posts.create') }}"><i class="fa fa-plus m-r-5" aria-hidden="true"></i>Создать новый пост</a></li>
                <li><a href="{{ route('posts.index') }}"><i class="fa fa-map-o m-r-5" aria-hidden="true"></i>Перечень постов</a></li>
                @role('superadministrator')
                <li><a href="{{ route('categories.index') }}"><i class="fa fa-clone m-r-5" aria-hidden="true"></i>Категории</a></li>
                @endrole
            </ul>
        </li>
        <li><a href="{{ route('users.index') }}">Пользователи</a></li>
        @role('superadministrator')
        <li><a href="#">Роли и права</a>
            <ul>
                <li><a href="{{ route('roles.index') }}"><i class="fa fa-user-circle-o m-r-5" aria-hidden="true"></i>Роли</a></li>

                <li><a href="{{ route('permissions.index') }}"><i class="fa fa-cog m-r-5" aria-hidden="true"></i>Права (разрешения)</a></li>

            </ul>
        </li>
        @endrole
    </ul>
</aside>
</div>