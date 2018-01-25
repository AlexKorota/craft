@extends ('layouts.manage')

@section('content')
    <div class="flex-container">

        <div class="columns">
            <div class="column is-centered">
                <h1 class="title m-t-20 m-l-20">Профиль</h1>

            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <figure class="image is-128x128">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                    </figure>
                    <br>
                    <h4>Никнейм:</h4>
                    <p>{{$user->name}}</p>
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