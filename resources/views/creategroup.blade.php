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
                <h2 class='title'>団体登録</h2>
                <form action="/group/create" method="POST">
                    @csrf
                    <div class="title">
                        <h2>Title</h2>
                        <input type="text" name="name" placeholder="団体名"/>
                    </div>
                    <input type="submit" value="保存"/>
                </form>
            <div class="back">[<a href="/group">back</a>]</div>
        @include('template', ['name' => $user])
    </body>
</html>
