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
            <div class='post'>
                <h2 class='title'>マイページ</h2>
                <p class='body'>ログインしたユーザの情報</p>
                <p class='body'>あなたの</p>
                <p class='body'>idは         : {{ $user['id'] }}</p>
                <p class='body'>ユーザ名は   : {{ $user['name'] }}</p>
                <p class='body'>メールは     : {{ $user['email'] }}</p>
                <p class='body'>作成時間は   : {{ $user['created_at'] }}</p>
                <p class='body'>管理者権限は : {{ $user['admin'] }}</p>
                <p class='body'>です.</p>
            </div>
            <div class='post'>
                <h2 class='title'>団体新規作成</h2>
                <p class='body'>[<a href="/group/create">新規作成(/group/create)</a>]</p>
                <h2 class='title'>宿泊先新規作成</h2>
                <p class='body'>[<a href="/place/create">新規作成(/place/create)</a>]</p>
            </div>
        </div>
        @include('template')
    </body>
</html>
