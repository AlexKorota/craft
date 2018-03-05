@extends('layouts.app')

@section('content')
    <div class="flex-container m-l-20">
        <div class="columns">
            <div class="column is-half is-offset-one-fifth">

                @foreach($posts as $post)

                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <figure class="image is-128x128">
                                    @if(isset($post->image))
                                        <img src={{ asset('post_images/' . $post->image) }} alt="Image">
                                    @else
                                        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                                    @endif
                                </figure>
                            </div>
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <strong><a href="{{route('post', $post->id)}}"> {{$post->title}} </a></strong> <small>{{$post->user->name}}</small>
                                        <br>
                                            @foreach($post->tags as $tag)
                                                <form action="{{route('post.findbytag', $tag->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    <button class="button tag-button is-small is-rounded">{{$tag->name}}
                                                        <input type="hidden" name="id" value="{{$tag->id}}"/>
                                                    </button>
                                            @endforeach
                                        </form>
                                    <br>
                                    <p>
                                        {!! htmlspecialchars_decode($post->excerpt) !!}
                                    </p>
                                </div>
                            </div>
                        </article>
                        <div class="is-pulled-right"><a href="{{route('post', $post->id)}}"> Читать далее </a></div>
                    </div>
                @endforeach
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
