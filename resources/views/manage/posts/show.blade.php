@extends('layouts.manage')

@section('content')

    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">{{$post->title}}</h1>
            </div>
        </div>
        <form action="{{route('posts.store')}}" method="POST">
            {{csrf_field()}}
            <div class="columns">
                <div class="column is-three-quarters-desktop">
                    <div class="card">
                        <div class="card-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div> <!-- end of column .three-quarters-->
                <div class="column is-one-quarter-desktop">
                    <div class="card-widget m-t-20">
                        <ul>
                            <li><button
                                        class="button is-success is-fullwidth" >Опубликовать
                                    <input type="hidden" name="status" value="2"/>
                                </button>
                            </li>
                            <li><button
                                        class="button is-info is-fullwidth m-t-15" >Сохранить как черновик
                                    <input type="hidden" name="status" value="1"/>
                                </button>
                            </li>
                            <li><a href="{{route('posts.index')}}" class="button is-danger is-fullwidth m-t-15">Отменить</a> </li>
                        </ul>
                    </div>
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

            },
            methods: {
//
            }
        });
    </script>

@endsection