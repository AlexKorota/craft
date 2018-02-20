@extends('layouts.app')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column is-half is-offset-1">
                <div class="post-title">{{$post->title}}</div>
                <div class="post-info">
                    Автор: {{$post->user->name}}
                    Пост создан: {{$post->created_at}}
                </div>
                <div class="tag-block m-t-5">
                    {{--@foreach($tags as $tag)--}}
                    @foreach($post->tags as $tag)
                        <form action="{{route('post.findbytag', $tag->id)}}" method="POST">
                            {{csrf_field()}}
                            <button class="button tag-button is-small is-rounded">{{$tag->name}}
                                <input type="hidden" name="name" value="{{$tag->id}}"/>
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-three-quarters-desktop is-offset-1">
                @if(isset($post->image))
                    <div class="post-image">
                        <img src="{{ asset('post_images/' . $post->image) }}"  height="400" width="400">
                    </div>
                @endif
                {!! htmlspecialchars_decode($post->content) !!}

            </div> <!-- end of column .three-quarters-->
        </div>
    </div>
@endsection