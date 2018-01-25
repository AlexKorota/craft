@extends ('layouts.manage')

@section('content')
    <div class="flex-container">
            <div class="columns">
                <div class="column is-centered">
                    <h1 class="title m-t-20 m-l-20">Управление пользователями</h1>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Дата регистрации</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <th><a href="{{route('users.show', $user->id)}}"> {{ $user->name }}</a></th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->created_at }}</th>
                                <th><a class="button is-outlined" href="#">Забанить</a> </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        {{ $users->links() }}
    </div>

@endsection
