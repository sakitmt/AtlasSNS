@extends('layouts.login')

@section('content')
    <div class="follow-list post-area">

        <div class="title follow-title">
            <P>Follow List</P>
        </div>

        <div class="follow-icon-list">
            @foreach ($all_users as $user)
                @if (auth()->user()->isFollowing($user->id))
                <div class="followicon">
                    <div>
                        <a href="{{ route('other',['userdata'=>$user->id]) }}">
                            <img src="{{ asset('storage/user_images/' .$user->images )}}" class="rounded-circle list-icon" width="50" height="50">
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

    </div>


    @foreach ($all_posts as $post)
        @if(auth()->user()->isFollowing($post->user_id))
            <div class="area-browsing">
                <div class="area-user-icon">
                    <a href="{{ route('other',['userdata'=>$post->id]) }}">
                    <img src="{{ asset('storage/user_images/' .$post->images )}}" class="rounded-circle" width="50" height="50">
                    </a>
                </div>

                <div class="area-contents">
                    <div class="area-username">
                        <div class="area-username-name">
                            <p>{{ $post->username }}</p>
                        </div>

                        <div class="area-daytime">
                            <p>{{ $post->created_at }}</p>
                        </div>
                    </div>

                    <div class="area-post">
                        {{ $post->post }}
                    </div>
                </div>
            </div>
        @endif


    @endforeach

@endsection