@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="notification is-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-100">
            <div class="card">
                <div class="card-content">
                    <h1 class="title has-text-centered">Забыли пароль?</h1>

                    <form action="{{route('password.email')}}" method="POST" role="form">
                        {{csrf_field()}}
                        <div class="field">
                            <label for="email" class="label">Адрес электронной почты</label>
                            <p class="control">
                                <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="example@google.com"
                                       value="{{old('email')}}" required>
                            </p>
                            @if($errors->has('email'))
                                <p class="help is-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <button class="button is-outlined is-fullwidth m-t-30">Получить ссылку для восстановления пароля</button>
                    </form>

                </div>

            </div> <!-- card end -->
        </div>
    </div>
@endsection
