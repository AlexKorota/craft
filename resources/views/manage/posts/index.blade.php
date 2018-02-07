@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-10">
        <h1 class="title">Перечень постов</h1>
        @foreach($posts as $post)
        <div class="columns">
            <div class="column is-one-quarter m-l-25">
                <a href="{{route('posts.show', $post->id)}}">
                    {{$post->title}}
                </a>
            </div>
            <div class="column is-one-fifth">
                    @if($post->status == 1)
                        <p>Сохранен как черновик</p>
                    @elseif($post->status == 2)
                        <p>Опубликован</p>
                    @elseif($post->status == 0)
                        <p>Пост забанен администратором</p>
                    @endif
            </div>
            <div class="column">
                <h1>{{strip_tags($post->excerpt)}}</h1>
            </div>
            <div class="column is-one-fifth m-r-20">

                    <a href="{{route('posts.show', $post->id)}}">
                        <button class="button post-list-buttons"><i class="fa fa-eye m-r-5" aria-hidden="true"></i>Просмотр</button>
                    </a>

                    <a href="{{route('posts.edit', $post->id)}}">
                        <button class="button is-warning post-list-buttons"><i class="fa fa-pencil m-r-5" aria-hidden="true"></i>Редактировать</button>
                    </a>

            </div>
        </div>
            <hr>
        @endforeach
    </div>

@endsection