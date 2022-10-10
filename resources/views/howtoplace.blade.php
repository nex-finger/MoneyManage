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
                <h2 class='title'>宿泊先を登録した使用者の操作方法説明ページ</h2>
                <p class='body'>ここに使い方を記述</p>
                @include('template', ['name' => $user])
            </div>
        </div>
    </body>
</html>
