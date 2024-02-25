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

        <div class="login-content">
            <p class="welcome-msg">
                AtlasSNSへようこそ
            </p>
            <div class="login-form">
                {{ Form::label('mail adress') }}
                {{ Form::text('mail',null,['class' => 'login-input']) }}
                {{ Form::label('password') }}
                {{ Form::password('password',['class' => 'login-input']) }}
                <div class="update-btn">
                    {{ Form::submit('LOGIN',['class' => 'btn btn-danger']) }}
                </div>
            </div>
            <p class="register-link">
                <a class="new-user" href="/register">新規ユーザーの方はこちら</a>
            </p>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection