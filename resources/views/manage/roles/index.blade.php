@extends('layouts.manage')

@section('content')

    <div class="flex-container m-l-20 ">
        <div class="columns">
            <div class="column is-centered">
                <h1 class="title">Перечень ролей пользователей</h1>
            </div>
            <div class="column is-pulled-right">
                <a class="button is-warning" href="{{route('roles.create')}}"><i class="fa fa-user-plus m-r-10"></i>Добавить роль</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-content">
                <table class="table is-striped is-narrow is-hoverable is-fullwidth ">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Slug</th>
                        <th>Описание</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <th>{{ $role->display_name }}</th>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td class="has-text-centered">
                                <a class="button is-warning is-small m-r-5" href="{{route('roles.show', $role->id)}}"><i class="fa fa-eye" aria-hidden="true" >Просмотр</i></a>
                                <a class="button is-warning is-small " href="{{route('roles.edit', $role->id)}}"><i class="fa fa-pencil-square-o">Редактировать</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection