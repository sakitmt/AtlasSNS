@extends('layouts.login')

@section('content')
<!--  検索枠  -->
<div class="search-form">
  {!! Form::open(['url' => '/search', 'method' => 'get']) !!}
  @csrf
  <div class="flex-box search-box">
    <div>
      {{ Form::text('search',null,['class' => 'input search-space', 'placeholder' => 'ユーザー名']) }}
    </div>

    <div class="search-user">
      {!! Form::button('<img src="images/search.png" class="fas search-btn"></i>', ['class' => "btn", 'type' => 'submit' ]) !!}
    </div>

    @if (isset( $search ))
    <div class="search-word">

      <div class="search-text">検索ワード：{{ $search }}</div>
    </div>
    @endif

  </div>
  {!! Form::close() !!}

</div>

<!-- ユーザー一覧 -->
<div class="user-area">
  @foreach($all_users as $user)
  <div class="search-list">
  <div class="flex-box users-list">
    <!-- ユーザーアイコン -->
    <div class="user-icon">
      <img src="{{ asset('storage/user_images/' .$user->images )}}" class="rounded-circle" width="50" height="50">
    </div>

    <!-- ユーザー名 -->
    <div class="search-username">
      <a href="{{ route('other',['userdata'=>$user->id]) }}" >{{ $user->username }}</a>
    </div>

    <!-- ユーザーのフォロー/フォロー解除ボタン -->
    @if (auth()->user()->isFollowing($user->id))
      <form action="{{ route('unFollow', ['user' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">フォロー解除</button>
      </form>

      @else

      <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">フォローする</button>
      </form>

    @endif
  </div>
  </div>

  @endforeach
</div>

@endsection