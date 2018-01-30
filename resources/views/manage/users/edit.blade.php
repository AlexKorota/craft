@extends ('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column is-centered">
                <h1 class="title">Профиль</h1>
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
                            <p>Никнейм: {{ $user->name }}</p>
                        </div> <!-- firs column end -->
                        <div class="column">
                            <h4>Роли:</h4>
                            <form action="{{route('users.update', $user->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                            <input type="hidden" :value="rolesSelected" name="roles">
                            <ul>
                                @foreach($roles as $role)
                                    <div class="field">
                                        <b-checkbox v-model="rolesSelected" native-value="{{$role->id}}"> {{ $role->display_name }} </b-checkbox>
                                    </div>
                                @endforeach
                            </ul>
                            <button class="button is-warning m-l-30"><i class="fa fa-floppy-o m-r-10"></i>Сохранить</button>
                            </form>
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

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                rolesSelected: {!! $user->roles->pluck('id') !!},
            },
        });
    </script>
@endsection