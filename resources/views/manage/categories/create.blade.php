@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Создание новой категории</h1>
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
        <hr>

        <div class="columns">
            <div class="column">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="columns">
                        <div class="column is-one-third">
                            <b-field>
                                <b-upload v-model="image" name="image">
                                    <a class="button is-warning">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                        <span class="m-l-5">Загрузить иконку категории</span>
                                    </a>
                                </b-upload>
                                <div v-if="image && image.length">
                                    <span class="file-name" v-text="image[0].name"></span>
                                </div>
                            </b-field>
                            <p class="control">
                                <input type="text" class="input" name="name" placeholder="Название категории">
                            </p>
                        </div>
                        <div class="column is-one-quarter">
                                <p class="control">
                                    <button class="button is-warning">Создать новую категорию</button>
                                </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                image: [],
            },
        });
    </script>
@endsection
