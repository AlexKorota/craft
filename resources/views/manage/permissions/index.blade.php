@extends('layouts.manage')

@section('content')

    <div class="flex-container m-l-20 ">
        <div class="columns">
            <div class="column is-centered">
                <h1 class="title">Перечень прав пользователей</h1>
            </div>
            <div class="column is-pulled-right">
                <a class="button is-warning" href="{{route('permissions.create')}}"><i class="fa fa-user-plus m-r-10"></i>Добавить разрешения</a>
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
                        @foreach($permissions as $permission)
                            <tr>
                                <th>{{ $permission->display_name }}</th>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td class="has-text-centered">
                                    <a class="button is-warning is-small m-r-5" href="{{route('permissions.show', $permission->id)}}"><i class="fa fa-eye" aria-hidden="true" >Просмотр</i></a>
                                    <a class="button is-warning is-small " href="{{route('permissions.edit', $permission->id)}}"><i class="fa fa-pencil-square-o">Редактировать</i></a>
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