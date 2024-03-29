@extends('layouts.login')

@section('content')
<div class="post-area-top"><!-- 投稿エリア -->
    <form class="post-area" action="{{ url('top') }}" method="POST">
    {{ csrf_field() }}
        <div class="user-icon-area">
            <img class="rounded-circle"  width="50" height="50" src="{{ asset('storage/user_images/' .auth()->user()->images )}}">
        </div>
        <div class="post-content-area">
            {!! Form::textarea("post_con",null,['class' => 'input post-content', 'placeholder' => '投稿内容を入力してください。', 'cols'=>'70' , 'rows' => '5'])!!}
        </div>
        <div class="post-btn-area">
            <input class="post-btn" type="image" src="images/post.png" alt="送信ボタン">
        </div>
    </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@foreach($posts as $post) <!-- @ fo-r-achは繰り返し処理を行う。@ end-fo-r-eachが必ず必要 -->
    @if(auth()->user()->isFollowing($post->user_id) || Auth::user()->id == $post->user_id)
        <form action="{{ url('top') }}" method="PUT">
            @method("PUT")
            @csrf
            <div class="area-browsing">
                <div class="area-user-icon"><!--    ユーザーアイコン    -->
                    <img class="user-icon rounded-circle"  width="50" height="50" src="{{ asset('storage/user_images/' .$post->user->images )}}"> <!-- ユーザーアイコンはユーザーによって変わるように修正 -->
                </div>
                <div class="area-contents">
                    <div class="area-username">
                        <div class="area-username-name">
                            <!--    ユーザーネーム    -->
                            <tr>{{ $post -> user -> username }}</tr>
                        </div>
                        <div class="area-daytime">
                            <!--    投稿・編集日時    -->  <!-- 編集日時があれば編集日時を、なければ投稿日時を表示するように修正 -->
                            <tr>{{ $post -> created_at -> format('Y-m-d H:i') }}</tr>
                        </div>
                    </div>
                    <div class="area-post">
                        <!--    投稿本文    -->
                        <tr>{!! nl2br($post -> post) !!}</tr>
                    </div>
                    <div class="area-btn">
                        @if (Auth::user()->id == $post->user_id)
                        <div class="content">
                            <!-- 投稿の編集ボタン -->
                            <a class="js-modal-open" href="" post={{ $post -> post }} post_id={{ $post -> id }}>
                                <input class="edit_btn" type="image" src="images/edit.png" alt="送信ボタン" >
                            </a>
                        </div>
                        <!-- 投稿の削除アイコン -->
                        <a class="trash-btn" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')" >
                            <img class="trash-img" src="images/trash.png" alt="削除" onmouseover="this.src='images/trash-h.png'" onmouseout="this.src='images/trash.png'">
                        </a>
                        @endif
                        <!-- form :利用者の入力が必要なとき　a :ボタン操作のみなど  -->
                    </div>
                </div>
            </div>
        </form>
    @endif
@endforeach


<!-- モーダルの中身 -->
<div class="modal js-modal">
    <div class="modal_bg js-modal-close">
    </div>
    <div class="modal_content">
        <form action="/update" method="post">
            <textarea name="upPost" class="modal_post">
            </textarea>
            <input type="hidden" name="id" class="modal_id" value="">
            <a class="js-modal-update" href="" post_id={{ $post -> id }}>
                <input class="modal-post-img" type="image" src="images/edit.png" value="更新">
            </a>
            @csrf
        </form>
       <a class="js-modal-close-btn" href="">閉じる</a>
    </div>
</div>

@endsection
