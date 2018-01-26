@extends('layouts.manage')


@section('content')

    <div class="flex-container m-l-30">
        <div class="content">
            <div class="columns">
                <div class="column is-two-thirds">
                    <h1 class="title">Редактирование разрешения {{$permission->display_name}}</h1>
                    <hr>
                </div>
            </div>
            <div class="card">
                <form action="{{route('permissions.update', $permission->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="card-content">
                        <div class="columns">
                        <div class="column">
                                <label for="name" class="label">Название:</label>
                                <p class="control">
                                    <input type="text" class="input" name="display_name" id="display_name" value="{{$permission->display_name}}">
                                </p>
                        </div>
                        <div class="column">
                            <label for="name" class="label">Описание:</label>
                            <p class="control">
                                <input type="text" class="input" name="description" id="description" value="{{$permission->description}}">
                            </p>
                        </div>
                    </div>
                </div>
                <button class="button is-warning is-pulled-right m-r-100 m-t-10"><i class="fa fa-floppy-o m-r-10"></i>Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection