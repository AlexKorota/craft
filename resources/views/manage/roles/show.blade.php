@extends('layouts.manage')


@section('content')

    <div class="flex-container m-l-30">
        <div class="content">
            <div class="columns">
                <div class="column is-two-thirds">
                    <h1 class="title">Просмотр роли</h1>
                    <hr>
                </div>
                <div class="column is-pulled-right">
                    <a class="button is-warning" href="{{route('roles.edit', $role->id)}}"><i class="fa fa-pencil-square-o m-r-10"></i>Редактировать</a>
                </div>
            </div>
            @if (session('success'))
                <div class="columns">
                    <div class="column is-one-third">
                        <div class="notification is-primary">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-content">
                    <div class="columns">
                        <div class="column">
                            <div class="block">
                                <h3>Название:</h3>
                                <p>{{ $role->display_name }}</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="block">
                                <h3>Slug:</h3>
                                <p>{{ $role->name }}</p>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="block">
                                <h3>Описание:</h3>
                                <p>{{$role->description}}</p>
                                <hr>
                                <p>{{$role->display_name}} имеет следующие права:
                                <ul>
                                    @foreach($role->permissions as $p)
                                        <li>{{$p->display_name}} - <em>{{$p->description}}</em></li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection