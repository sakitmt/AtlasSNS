@extends('layouts.login')

@section('content')




{!! Form::open(['url' => 'profile','enctype' => 'multipart/form-data']) !!}
{{ csrf_field() }}



<div class="profile-area">

  <div class="prof-user-icon">
    <img class="rounded-circle"  width="50" height="50" src="{{ asset('storage/user_images/' .auth()->user()->images )}}">
  </div>


  <!--<div class="profile-content-title">






  </div>-->

  <div class="profile-block">
    <div class="profile-form">
      <div class="profile-title">
        {{ Form::label('user name') }}<br>
      </div>
      <div class="profile-content">
        {{ Form::text('username',$auth->username,['class' => 'input']) }}<br>
        @if ($errors->has('username'))
          <div class="profile-alert alert-dange">{{$errors->first('username')}}</div>
        @endif
      </div>
    </div>
    <div class="profile-form">
      <div class="profile-title">
        {{ Form::label('mail adress') }}<br>
      </div>
      <div class="profile-content">
        {{ Form::text('mail',$auth->mail,['class' => 'input']) }}<br>
        @if ($errors->has('mail'))
          <div class="profile-alert alert-dange">{{$errors->first('mail')}}</div>
        @endif
      </div>
    </div>
    <div class="profile-form">
      <div class="profile-title">
        {{ Form::label('password') }}<br>
      </div>
      <div class="profile-content">
        {{ Form::password('password',['class' => 'input']) }}<br>
        @if ($errors->has('password'))
          <div class="profile-alert alert-dange">{{$errors->first('password')}}</div>
        @endif
      </div>
    </div>
    <div class="profile-form">
      <div class="profile-title">
        {{ Form::label('password comfirm') }}<br>
      </div>
      <div class="profile-content">
        {{ Form::password('password_confirmation',['class' => 'input']) }}<br>
        @if ($errors->has('password_confirmation'))
          <div class="profile-alert alert-dange">{{$errors->first('password_confirmation')}}</div>
        @endif
      </div>
    </div>
    <div class="profile-form">
      <div class="profile-title">
        {{ Form::label('bio') }}<br>
      </div>
      <div class="profile-content">
        {{ Form::text('bio',$auth->bio,['class' => 'input']) }}<br>
        @if ($errors->has('bio'))
          <div class="profile-alert alert-dange">{{$errors->first('bio')}}</div>
        @endif
      </div>
    </div>
    <div class="profile-form">
      <div class="profile-title">
        {{ Form::label('icon image') }}<br>
      </div>
      <div class="profile-content">
        <label class="file-select-button">{{ Form::file('images', ['id'=>'file-image'])}}<br>
          <div class="picup">
            ファイルを選択
          </div>
        </label>
        <script>
          document.getElementById("file-image").addEventListener("change", function(e){
          e.target.nextSibling.nodeValue = e.target.files.length ? e.target.files[0].name : "ファイルを選択";
          });
        </script>
      </div>
    </div>
  </div>


</div>



<div class="update-btn">
  {{ Form::submit('更新',['class' => 'btn btn-danger update-btn']) }}
</div>


{!! Form::close() !!}

@endsection