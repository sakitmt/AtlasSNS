@extends('layouts.logout')

@section('content')

<div class="login-full">
    {!! Form::open() !!}
    <div class="login-title">
        <h1>
            <img class="atlas-img" src="images/atlas.png">
        </h1>
        <p class="s-title">
            Social Network Service
        </p>

        <div class="register-content">
            <h2 class="welcome-msg">新規ユーザー登録</h2>

            <div class="register-form">
                {{ Form::label('username') }}
                    @if ($errors->has('username'))
                        <div class="alert alert-dange">{{$errors->first('username')}}</div>
                    @endif
                {{ Form::text('username',null,['class' => 'register-input']) }}

                {{ Form::label('mail') }}
                    @if ($errors->has('mail'))
                        <div class="alert alert-dange">{{$errors->first('mail')}}</div>
                    @endif
                {{ Form::text('mail',null,['class' => 'register-input']) }}

                {{ Form::label('password') }}
                    @if ($errors->has('password'))
                        <div class="alert alert-dange">{{$errors->first('password')}}</div>
                    @endif
                {{ Form::password('password',['class' => 'register-input']) }}

                {{ Form::label('password confirm') }}
                    @if ($errors->has('password_confirmation'))
                        <div class="alert alert-dange">{{$errors->first('password_confirmation')}}</div>
                    @endif
                {{ Form::password('password_confirmation',['class' => 'register-input']) }}

                <div class="update-btn">
                    {{ Form::submit('REGISTER',['class' => 'btn btn-danger']) }}
                </div>

            </div>
            <p class="turn-back">
                <a class="new-user" href="/login">ログイン画面へ戻る</a>
            </p>
        </div>
    </div>
    {!! Form::close() !!}

</div>
@endsection
