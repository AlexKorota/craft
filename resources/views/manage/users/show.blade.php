@extends ('layouts.manage')

@section('content')
    <div class="flex-container  m-l-20">

        <div class="columns">
            <div class="column is-centered">
                <h1 class="title">Профиль</h1>
            </div>
            <div class="column is-pulled-right">
                <a class="button is-warning" href="{{route('users.edit', $user->id)}}"><i class="fa fa-pencil-square-o m-r-10"></i>Редактировать</a>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <div class="columns">
                        <div class="column">
                            <figure class="image is-128x128">
                                <img src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <br>
                            <h4>Никнейм:</h4>
                            <p>{{$user->name}}</p>
                        </div> <!-- firs column end -->
                        <div class="column">
                            <h4>Роли пользователя:</h4>
                            <ul>
                            @foreach($user->roles as $role)
                                    <li>{{ $role->display_name }} </li>
                             @endforeach
                            </ul>
                        </div> <!-- Second column end -->
                    </div>
                    <h4>О себе:</h4>
                    <div class="card">
                        <div class="card-content">
                            Тут будет информация о пользователе
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

