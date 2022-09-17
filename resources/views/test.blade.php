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
                <h2 class='title'>データベース情報</h2>
                <p class='body'>This is a sample body.</p>
                <p class='body'>value =</p>
                @foreach ($tests as $test)
                    <p class='body'>id                : {{ $test->id }}</p>
                    <p class='body'>name              : {{ $test->name }}</p>
                    <p class='body'>email             : {{ $test->email }}</p>
                    <p class='body'>email_verified_at : {{ $test->email_verified_at }}</p>
                    <p class='body'>created_at        : {{ $test->created_at }}</p>
                    <p class='body'>updated_at        : {{ $test->updated_at }}</p>
                    <hr>
                @endforeach
            </div>
        </div>
    </body>
</html>
