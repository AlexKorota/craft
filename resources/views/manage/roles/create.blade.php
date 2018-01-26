@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Создание новой роли</h1>
            </div>
        </div>
        <form action="{{route('roles.store')}}" method="POST">
            {{csrf_field()}}
        <div class="columns">
            <div class="column">
                <div class="block">
                    </div>
                    <div class="columns">
                        <div class="column is-one-third">
                            <div class="field">
                                <label for="display_name" class="label">Название</label>
                                <p class="control">
                                    <input type="text" class="input" name="display_name" id="display_name">
                                </p>
                            </div>

                            <div class="field">
                                <label for="name" class="label">Slug</label>
                                <p class="control">
                                    <input type="text" class="input" name="name" id="name">
                                </p>
                            </div>

                            <div class="field">
                                <label for="description" class="label">Описание</label>
                                <p class="control">
                                    <input type="text" class="input" name="description" id="description">
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="button is-warning">Создать новую роль</button>
            </div>
            <div class="column">
                <input type="hidden" :value="permissionsSelected" name="permissions">
                <p>
                <h5 class="label"> Права (разрешения) для создаваемой роли: </h5>
                <ul>
                    @foreach($permissions as $permission)
                        <div class="field">
                            <b-checkbox v-model="permissionsSelected" native-value="{{$permission->id}}">{{$permission->display_name}} - {{$permission->description}} </b-checkbox>
                        </div>
                    @endforeach
                </ul>
                </p>
            </div>
        </div>
        </form>
    </div>



@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionsSelected: [],
            },
        });
    </script>
@endsection