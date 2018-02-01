@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-30">
        <div class="columns">
            <div class="column">
                <h1 class="title">Создание новой категории</h1>
            </div>
        </div>
        <hr>

        <div class="columns">
            <div class="column">
                <form action="{{route('categories.store')}}" method="POST">
                    {{csrf_field()}}

                    <div class="columns">
                        <div class="column is-one-quarter">
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
