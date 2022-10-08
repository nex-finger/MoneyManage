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
                <h2 class='title'>グループ名 : {{ $leader }}</h2>
            </div>
            <div class='post'>
                @foreach($members as $member)
                <p class='body'>id : {{ $member['user_id'] }}</p>
                @endforeach
            </div>
        </div>
        @include('template', ['name' => $user])
    </body>
</html>
