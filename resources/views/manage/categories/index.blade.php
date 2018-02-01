@extends('layouts.manage')

@section('content')
    <div class="flex-container m-l-20 ">
        <div class="columns">
            <div class="column is-centered">
                <h1 class="title">Категории постов</h1>
            </div>
            <div class="column is-pulled-right">
                <a class="button is-warning" href="{{route('categories.create')}}"><i class="fa fa-user-plus m-r-10"></i>Создать новую категорию</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-content">
                <ul>
                @foreach($categories as $category)
                <li> - {{ $category->name }}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    </div>
@endsection