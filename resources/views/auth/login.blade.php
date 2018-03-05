@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title has-text-centered">Вход</h1>

                <form action="{{route('login')}}" method="POST" role="form">
                    {{csrf_field()}}
                    <div class="field">
                        <label for="email" class="label">Адрес электронной почты</label>
                        <p class="control">
                            <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="example@google.com"
                            value="{{old('email')}}" required autofocus>
                        </p>
                        @if($errors->has('email'))
                            <p class="help is-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="field">
                        <label for="password" class="label">Пароль</label>
                        <p class="control">
                            <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password"
                                   value="{{old('email')}}" required>
                        </p>
                        @if($errors->has('password'))
                            <p class="help is-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <b-checkbox name="remember" class="m-t-20">Запомнить меня</b-checkbox>
                    <button class="button is-outlined is-fullwidth m-t-30">Войти</button>
                </form>

            </div>

        </div> <!-- card end -->
        <h5 class="has-text-centered m-t-20"><a href="{{route('password.request')}}" class="is-muted">Забыли пароль?</a></h5>

    </div>
</div>
@endsection
@section('scripts')
    <script>
        var app = new Vue({
            el: '#app'
        });
    </script>
@endsection