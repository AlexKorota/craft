<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{route('home')}}" class="navbar-item">
                <img src="{{asset('images/mad-logo.png')}}" alt="logo" class="mad-logo">
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start m-t-20">
                @foreach($categories as $category)
                <figure class="image m-l-15">
                    <a href="{{route('posts.findbycategory', $category)}}" class="navbar-item">
                        <img class="m-b-5" src="{{asset('category_images/' . $category->image)}}">
                        <span>{{ $category->name }}</span>
                    </a>
                </figure>
                @endforeach
            </div>
            <div class="navbar-end">
                @if (Auth::guest())
                    <a href="{{route('login')}}" class="navbar-item">Войти</a>
                    <a href="{{route('register')}}" class="navbar-item">Зарегистрироваться</a>
                @else
                    <div class="navbar-item is-hoverable has-dropdown">
                        <a href="" class="navbar-link">
                            <i class="fa fa-user-o fa-2x" aria-hidden="true"></i>
                            <span>Приветствую, {{ Auth::user()->name }}</span>
                        </a>
                        <div class="navbar-dropdown">
                            <a href="{{"/users/" . Auth::user()->id}}" class="navbar-item">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <span>Профиль</span>
                            </a>
                            <a href="#" class="navbar-item">Second drop</a>
                            <a href="{{route('manage.dashboard')}}" class="navbar-item">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <span>Управление</span>
                            </a>
                            <hr class="navbar-divider">
                            <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <span>Выход</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>