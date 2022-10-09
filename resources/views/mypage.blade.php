<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Test Page</h1>
        <div class='testid'>
            <div class='body'>
                <h2 class='title'>マイページ</h2>
                <h3 class='body'>ログインしたユーザの情報</h3>
                <p class='body'>あなたの</p>
                <p class='body'>idは         : {{ $user['id'] }}</p>
                <p class='body'>ユーザ名は   : {{ $user['name'] }}</p>
                <p class='body'>メールは     : {{ $user['email'] }}</p>
                <p class='body'>作成時間は   : {{ $user['created_at'] }}</p>
                <p class='body'>管理者権限は : {{ $user['admin'] }}</p>
                <p class='body'>です.</p>
            </div>
            <div class='body'>
                <h3 class='body'>あなたが代表している団体</h3>
                
                @foreach($groups as $group)
                    <p class='body'>団体名 : {{ $group['name'] }}</p>
                    <p class='body'>代表者氏名 : {{ $group['leader_name'] }}</p>
                    <p class="edit">[<a href="/group/member/{{ $group->id }}">詳細（参加脱退はこちら）</a>]</p>
                    <hr>
                @endforeach
                
                <h3 class='title'>団体新規作成</h3>
                <p class='body'>[<a href="/group/create">新規作成(/group/create)</a>]</p>
                <hr>
                
                <h3 class='body'>あなたが代表している宿泊先</h3>
                
                @foreach($places as $place)
                    <p class='body'>宿泊先 : {{ $place['name'] }}</p>
                    <p class='body'>代表者氏名 : {{ $place['leader_name'] }}</p>
                    <p class="edit">[<a href="/place/{{ $place->id }}">詳細（参加脱退はこちら）</a>]</p>
                    <hr>
                @endforeach
                
                <h3 class='title'>宿泊先新規作成</h3>
                <p class='body'>[<a href="/place/create">新規作成(/place/create)</a>]</p>
                <hr>
                
            </div>
        </div>
        @include('template')
    </body>
</html>
