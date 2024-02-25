@extends('layouts.logout')

@section('content')

<div class="login-title">
  <h1>
      <img class="atlas-img" src="images/atlas.png">
  </h1>
  <p class="s-title">
      Social Network Service
  </p>
  <div class="added-content" id="clear">
    <h2 class="welcome-msg">
      <p>{{Session::get('username')}}さん</p>
      <p>ようこそ! AtlasSNSへ</p>
    </h2>
    <div class="go-msg">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう!</p>
    </div>
    <div class="turn-back-login">
      <p>
        <a class="new-user-login btn" href="/login">ログイン画面へ</a>
      </p>
    </div>
  </div>
</div>

@endsection