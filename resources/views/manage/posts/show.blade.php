@extends('layouts.manage')

@section('content')

    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">{{$post->title}}</h1>
            </div>
        </div>
            <div class="columns">
                <div class="column is-three-quarters-desktop">
                    @if(isset($post->image))
                    <div class="post-image">
                        <img src="{{ asset('post_images/' . $post->image) }}"  height="400" width="400">
                    </div>
                    @endif
                    {!! $post->content !!}
                    <hr>

                    <div class="card">
                        <div class="card-content">
                            @foreach($tags as $tag)
                                <span>{{$tag}}</span>
                            @endforeach
                        </div>
                    </div>

                </div> <!-- end of column .three-quarters-->
                <div class="column is-one-quarter-desktop">
                    <div class="card-widget m-t-20">
                        <ul>
                            <form action="{{route('post.status', $post->id)}}" method="POST">
                            {{csrf_field()}}
                            @if($post->status == 1)
                                <li>
                                    <button class="button is-success is-fullwidth" >Опубликовать
                                        <input type="hidden" name="status" value="2"/>
                                    </button>
                                </li>
                            @elseif($post->status == 2)
                                <li>
                                    <button class="button is-info is-fullwidth m-t-15" >Сохранить как черновик
                                        <input type="hidden" name="status" value="1"/>
                                    </button>
                                </li>
                            @endif
                                <li>
                                   <a href="{{route('posts.edit', $post->id)}}" class="button is-warning is-fullwidth m-t-15">Редактировать </a>
                                </li>
                            </form>

{{--А СТОИТ ЛИ ДАВАТЬ ВОЗМОЖНОСТЬ УДАЛИТЬ?--}}
                            {{--<form action="{{route('posts.destroy', $post->id)}}" method="POST" enctype="multipart/form-data">--}}
                                {{--{{csrf_field()}}--}}
                                {{--{{method_field('DELETE')}}--}}
                                {{--<li><button class="button is-danger is-fullwidth m-t-15">Удалить пост</button> </li>--}}
                            {{--</form>--}}
                                <li class="m-t-10">
                                    Статус:
                                    @if($post->status == 1) Черновик
                                    @elseif($post->status == 2) Опубликован
                                    @endif
                                </li>
                        </ul>

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

            },
            methods: {
//
            }
        });
    </script>

@endsection