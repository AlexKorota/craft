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
                    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                    <div class="columns">
                        <div class="column">
                            <div class="avatar">
                                <figure class="image avatar-image is-128x128">
                                    <img src="{{ asset('users_avatars/' . $user->avatar) }}">
                                </figure>
                                <b-field>
                                    <b-upload v-model="avatar" name="avatar">
                                        <a class="button is-warning">
                                            <i class="fa fa-upload" aria-hidden="true"></i>
                                            <span class="m-l-5">Загрузить аватар</span>
                                        </a>
                                    </b-upload>
                                    <div v-if="avatar && avatar.length">
                                        <span class="file-name" v-text="avatar[0].name"></span>
                                    </div>
                                </b-field>
                            </div>
                            <br>
                            <b-field label="Ник:">
                                <b-input placeholder="Ник"
                                         size="is-medium"
                                         v-model="name"
                                         {{--:value = "name"--}}
                                         name="name">
                                </b-input>
                            </b-field>
                        </div> <!-- firs column end -->
                        <div class="column">
                            <h4>Роли:</h4>
                            <input type="hidden" :value="rolesSelected" name="roles">
                            <ul>
                                @foreach($roles as $role)
                                    <div class="field">
                                        <b-checkbox v-model="rolesSelected" native-value="{{$role->id}}"> {{ $role->display_name }} </b-checkbox>
                                    </div>
                                @endforeach
                            </ul>
                            <button class="button is-warning m-l-30"><i class="fa fa-floppy-o m-r-10"></i>Сохранить</button>
                        </div> <!-- Second column end -->
                    </div>
                    <h4>О себе:</h4>
                        <b-field class="m-t-20">
                            <b-input placeholder="Пару слов о себе"
                                 type="textarea"
                                 rows="5"
                                 v-model="description"
                                 name="description">
                            </b-input>
                        </b-field>
                    </form>
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
                name: '{{$user->name}}',
                description: '{{$user->description}}',
                avatar: [],
                rolesSelected: {!! $user->roles->pluck('id') !!},
            },
        });
    </script>
@endsection