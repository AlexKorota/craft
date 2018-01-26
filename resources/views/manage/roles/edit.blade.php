@extends('layouts.manage')


@section('content')

    <div class="flex-container m-l-30">
        <div class="content">
            <div class="columns">
                <div class="column is-two-thirds">
                    <h1 class="title">Редактирование роли {{$role->display_name}}</h1>
                </div>
                <hr>
            </div>
            <div class="card">
                <div class="columns">
                    <div class="column">
                        <form action="{{route('roles.update', $role->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="card-content">
                                <div class="columns">
                                    <div class="column">
                                        <label for="name" class="label">Название:</label>
                                        <p class="control">
                                            <input type="text" class="input" name="display_name" id="display_name" value="{{$role->display_name}}">
                                        </p>
                                    </div>
                                    <div class="column">
                                        <label for="name" class="label">Описание:</label>
                                        <p class="control">
                                            <input type="text" class="input" name="description" id="description" value="{{$role->description}}">
                                        </p>
                                    </div>
                                </div>
                                <input type="hidden" :value="permissionsSelected" name="permissions">
                                <p>Права (разрешения):
                                <ul>
                                    @foreach($permissions as $permission)
                                        <div class="field">
                                            <b-checkbox v-model="permissionsSelected" native-value="{{$permission->id}}">{{$permission->display_name}} - {{$permission->description}} </b-checkbox>
                                        </div>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                            <button class="button is-warning m-l-40"><i class="fa fa-floppy-o m-r-10"></i>Сохранить</button>
                        </form>
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
                permissionsSelected: {!!$role->permissions->pluck('id')!!},
            },
        });
    </script>
@endsection