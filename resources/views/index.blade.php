<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>大人数での会計管理システム</h1>
        <div class='posts'>
            <div class='post'>
                <h2 class='title'>トップページ</h2>
                <p class='body'>ここはトップページです</p>
                <p class='body'>ログインが成功するとここに飛びます</p>
                @include('template')
            </div>
        </div>
    </body>
</html>
