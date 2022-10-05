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
                <h2 class='title'>宿泊先新規作成</h2>
                <p class='body'>[<a href="/group/create">新規作成(/place/create)</a>]</p>
            </div>
            <div class='post'>
                <h2 class='title'>宿泊先一覧</h2>
                <p class='body'>id : {{ $place['id'] }}</p>
                <p class='body'>宿泊先 : {{ $place['name'] }}</p>
                <p class='body'>代表者id : {{ $place['leader_id'] }}</p>
                <p class='body'>代表者名前 : {{ $place['leader_name'] }}</p>
                <p class='body'>住所 : {{ $place['address'] }}</p>
                <p class='body'>基本料金 : {{ $place['value'] }}</p>
                <p class='body'>作成時間 : {{ $place['created_at'] }}</p>
                <p class="edit">[<a href="/place/aaa/{{ $place->id }}">予約する</a>]</p>
                <hr>
            </div>
        </div>
        @include('template', ['name' => $user])
    </body>
</html>