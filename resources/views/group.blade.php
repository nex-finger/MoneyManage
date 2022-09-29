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
                <h2 class='title'>団体新規作成</h2>
                <p class='body'>[<a href="/group/create">新規作成(/group/create)</a>]</p>
            </div>
            <div class='post'>
                <h2 class='title'>団体一覧</h2>
                @foreach($groups as $group)
                <p class='body'>id : {{ $group['id'] }}</p>
                <p class='body'>団体名 : {{ $group['name'] }}</p>
                <p class='body'>代表者id : {{ $group['leader_id'] }}</p>
                <p class='body'>代表者名前 : {{ $group['leader_name'] }}</p>
                <p class='body'>作成時間 : {{ $group['created_at'] }}</p>
                <hr>
                @endforeach
            </div>
        </div>
        @include('template')
    </body>
</html>
