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
                @foreach($places as $place)
                <p class='body'>宿泊先 : {{ $place['name'] }}</p>
                <p class='body'>代表者名前 : {{ $place['leader_name'] }}</p>
                <p class="edit">[<a href="/place/{{ $place->id }}">詳細（予約はこちら）</a>]</p>
                <hr>
                @endforeach
            </div>
        </div>
        @include('template', ['name' => $user])
    </body>
</html>