@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Редактирование</h1>
            </div>
        </div>
        <form action="{{route('posts.update', $post->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="columns">
                <div class="column is-three-quarters-desktop">
                    <div class="card">
                        <div class="card-content">
                            <b-field>
                                <b-select placeholder="Категория" v-model="category">
                                    @foreach( $categories as $category )
                                        <option
                                                value="{{$category->id}}">{{$category->name}}
                                    @endforeach
                                            <input type="hidden" name="category" value="{{$category->id}}"/>
                                        </option>
                                </b-select>
                            </b-field>
                            <b-field>
                                <b-input placeholder="Название поста"
                                         size="is-medium"
                                         v-model="title"
                                         name="title">
                                </b-input>
                            </b-field>

                            {{--<slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug"></slug-widget>--}}
                            {{--<input type="hidden" v-model="slug" name="slug"/>--}}

                            <b-field class="m-t-20">
                                <b-input placeholder="Тело поста..."
                                         type="textarea"
                                         rows="30"
                                         v-model="content"
                                         name="content">
                                </b-input>
                            </b-field>
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
                category: '{!! $post->category_id !!}',
                title: '{!! $post->title !!}',
                {{--slug: '{!! $post->slug !!}',--}}
                content: '{!! $post->content !!}',
                api_token: '{{Auth::user()->api_token}}'
            },
            methods: {
//                updateSlug: function(val){
//                    this.slug = val;
//                }
            }
        });
    </script>

@endsection