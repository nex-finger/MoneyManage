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
                <h2 class='title'>団体一覧</h2>
                @foreach($groups as $group)
                <p class='body'>id         : {{ $group['id'] }}</p>
                <p class='body'>name       : {{ $group['name'] }}</p>
                <p class='body'>leader_id  : {{ $group['leader_id'] }}</p>
                <p class='body'>created_at : {{ $group['created_at'] }}</p>
                <hR>
                @endforeach
            </div>
        </div>
    </body>
</html>
