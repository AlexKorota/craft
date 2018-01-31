@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Создание нового поста</h1>
            </div>
        </div>
        <form action="{{route('posts.store')}}" method="POST">
            {{csrf_field()}}
            <div class="columns">
                <div class="column is-three-quarters-desktop">
                    <div class="card">
                        <div class="card-content">
                            <b-field>
                                <b-input placeholder="Название поста"
                                         size="is-medium"
                                         v-model="title">
                                </b-input>
                            </b-field>

                            <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug"></slug-widget>
                            <input type="hidden" v-model="slug" name="slug"/>

                            <b-field class="m-t-20">
                                <b-input placeholder="Тело поста..."
                                         type="textarea"
                                         rows="30">
                                </b-input>
                            </b-field>
                        </div>
                    </div>
                </div> <!-- end of column .three-quarters-->
                <div class="column is-one-quarter-desktop">
                    <div class="card-widget m-t-20">
                        <ul>
                            <li><a class="button is-success is-fullwidth">Опубликовать</a> </li>
                            <li><a class="button is-info is-fullwidth m-t-15" >Сохранить как черновик</a> </li>
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
                title: '',
                slug: '',
                api_token: '{{Auth::user()->api_token}}'
            },
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                }
            }
        });
    </script>

@endsection
