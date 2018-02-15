@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Редактирование</h1>
            </div>
        </div>
        <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="columns">
                <div class="column is-three-quarters-desktop">
                    <div class="card">
                        <div class="card-content">
                            <b-field>
                                <b-select placeholder="Категория" v-model="category">
                                    @foreach( $categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}
                                    @endforeach
                                            <input type="hidden" name="category" value="{{$category->id}}"><input>
                                        </option>
                                </b-select>
                            </b-field>
                            <b-field>
                                <b-input placeholder="Название поста"
                                         size="is-medium"
                                         v-model="title"
                                         :value = "title"
                                         name="title">
                                </b-input>
                            </b-field>

                            <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug"></slug-widget>
                            <input type="hidden" v-model="slug" name="slug"/>

                            {{--image input--}}
                            @if(isset($post->image))
                            <figure class="image is-128x128 m-t-5">
                                <img src="{{ asset('post_images/' . $post->image) }}">
                            </figure>
                            @endif
                            <b-field class="m-t-10">
                                <b-upload v-model="image" name="image">
                                    <a class="button is-warning">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                        <span class="m-l-5">Изменить основное изображение поста</span>
                                    </a>
                                </b-upload>
                                <div v-if="image && image.length">
                                    <span class="file-name" v-text="image[0].name"></span>
                                </div>
                            </b-field>

                            {{--end image input--}}
                            {{-- tags input --}}
                            <b-field>
                                <b-taginput
                                        v-model="tags"
                                        placeholder="Введите теги">
                                </b-taginput>
                            </b-field>
                            <input type="hidden" name="tags" :value="tags">
                            {{-- end tags input --}}
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
                            <li>
                                <button class="button is-success is-fullwidth" >Сохранить</button>
                            </li>
                            {{--А СТОИТ ЛИ ДАВАТЬ ВОЗМОЖНОСТЬ УДАЛИТЬ?--}}
                            {{--<form action="{{route('posts.destroy', $post->id)}}" method="POST">--}}
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
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                category: '{!! $post->category->id !!}',
                title: '{!! addslashes($post->title) !!}',
                slug: '{!! $post->slug !!}',
                image: [],
                tags: {!! $post->tags()->pluck('name') !!},
                content: '{!! trim(json_encode(preg_replace(['/\'/','/\"/'], '', $post->content)), '"') !!}' ,
                api_token: '{{Auth::user()->api_token}}'
            },
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                }
            },
        });
    </script>

@endsection