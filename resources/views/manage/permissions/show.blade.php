@extends('layouts.manage')


@section('content')

    <div class="flex-container m-l-30">
        <div class="content">
            <div class="columns">
                <div class="column is-two-thirds">
                    <h1 class="title">Просмотр разрешения</h1>
                    <hr>
                </div>
                <div class="column is-pulled-right">
                    <a class="button is-warning" href="{{route('permissions.edit', $permission->id)}}"><i class="fa fa-pencil-square-o m-r-10"></i>Редактировать</a>
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
                                <p>{{ $permission->display_name }}</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="block">
                                <h3>Slug:</h3>
                                <p>{{ $permission->name }}</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="block">
                                <h3>Описание:</h3>
                                <p>Это разрешение позволяет пользователю {{ $permission->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection