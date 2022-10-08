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
            <h2 class='title'>宿泊先登録</h2>
                <form action="/place/create" method="POST">
                    @csrf
            <div class="title">
            <h2>情報</h2>
                <p><input type="text" name="name" placeholder="団体名"/></p>
                <p><input type="text" name="address" placeholder="住所"/></p>
                <p><input type="number" step="1" name="value" placeholder="基本料金"/></p>
                <p><input type="number" step="0.00000000000001" name="lat" placeholder="緯度"/></p>
                <p><input type="number" step="0.00000000000001" name="lng" placeholder="経度"/></p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/place">back</a>]</div>
        @include('template', ['name' => $user])
    </body>
</html>
