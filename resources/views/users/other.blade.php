@extends('layouts.login')

@section('content')
    <div class="flex-box icon-area">
        <div class="icon-margin flex-box">
            <div class="follow-btn post-area">
                @if (auth()->user()->isFollowed($user->id))
                    <div class="user-icon-area">
                        <img src="{{ asset('storage/user_images/' .$user->images )}}" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="item-title">
                        <div>name</div>
                        <div>bio</div>
                    </div>
                    <div class="item-content">
                        <div>{{ $user->username }}</div>
                        <div>{{ $user->bio }}</div>
                    </div>
                @endif
                <div class="follow-btn otherplof-follow-btn">
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
            <div class="other-postarea">
            @foreach ($all_posts as $post)
                @if($user->id == $post->user_id)
                    <div class="other-postspace">
                        <div class="other-icon">
                            <img src="{{ asset('storage/user_images/' .$post->images )}}" class="rounded-circle" width="50" height="50">
                        </div>
                        <div class="other-username-and-post">
                            <P class="other-username">{{ $post->username }}</P>
                            <div class="other-post">{{ $post->post }}</div>
                        </div>
                        <div class="other-posttime">
                            <p>{{ $post->created_at }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
@endsection