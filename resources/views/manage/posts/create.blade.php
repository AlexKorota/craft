@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Создание нового поста</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-third">
                @if (count($errors) > 0)
                    <div class="notification is-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="columns">
                <div class="column is-three-quarters-desktop">
                    <div class="card">
                        <div class="card-content">
                            <b-field label="Категория">
                                <b-select v-model="category" required>
                                    {{--<option disabled value="">Категория</option>--}}
                                    @foreach( $categories as $category )
                                    <option
                                        value="{{$category->id}}">{{$category->name}}
                                    </option>
                                    @endforeach
                                        <input type="hidden" name="category" v-model="category"/>
                                </b-select>
                            </b-field>
                            <b-field>
                                <b-input placeholder="Название поста"
                                         minlength="3"
                                         required
                                         size="is-medium"
                                         v-model="title"
                                         name="title">
                                </b-input>
                            </b-field>

                            <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug"></slug-widget>
                            <input type="hidden" v-model="slug" name="slug"/>

                                {{--image input--}}

                                    <b-field class="m-t-10">
                                        <b-upload v-model="image" name="image">
                                            <a class="button is-warning">
                                                <i class="fa fa-upload" aria-hidden="true"></i>
                                                <span class="m-l-5">Загрузить основное изображение поста</span>
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
                category: '',
                tags: [],
                image: [],
                title: '',
                slug: '',
                api_token: '{{Auth::user()->api_token}}',
            },
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                }
            }
        });
    </script>

@endsection
