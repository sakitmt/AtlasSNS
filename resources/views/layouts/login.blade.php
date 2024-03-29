<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- CDN読み込み -->
    <!-- 「CDN」はContent Delivery Networkの略で、簡単に言うとインターネット経由でファイルを配信する仕組みのこと -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">

    <!-- BootstrapのCSS読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jQuery読み込み -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id="head">
            <h1><a href="/top"><img class="img_atlas" src="/images/atlas.png" alt="Atlas"></a></h1>
            <div id="head-menu">
                <p class="username">{{ Auth::user()->username }} さん</p>
                <nav class="global">
                    <input type="checkbox" id="check">
                    <label class="down-menu" for="check"></label>
                    <ul class="global nav-menu">
                        <li class="menu"><a class="menu" href="/top">HOME</a></li>
                        <li class="menu"><a class="menu" href="/profile">プロフィール編集</a></li>
                        <li class="menu"><a class="menu" href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
                <div class="user-icon"> <!--ログインした人の画像-->
                    <img class="rounded-circle"  width="50" height="50" src="{{ asset('storage/user_images/' .auth()->user()->images )}}">
                </div>

            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p class="side-bae-text">{{ Auth::user()->username }}さんの</p>
                <div class="side-bae-text">
                    <p>フォロー数&emsp;{{ \App\Follow::where('following_id', Auth::id())->count() }}人</p>
                </div>
                <button class="btn btn-primary"><a href="/follow-list">フォローリスト</a></button>
                <div class="side-bae-text">
                    <p>フォロワー数&emsp;{{ \App\Follow::where('followed_id', Auth::id())->count() }}人</p>
                </div>
                <button class="btn btn-primary"><a href="/follower-list">フォロワーリスト</a></button>
            </div>
            <div class="btn-search">
                <button class="btn btn-primary "><a href="/search">ユーザー検索</a></button>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>

</html>