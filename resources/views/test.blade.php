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
                <p class='body'>userdata =</p>
                <hr>
                @foreach ($users as $user)
                    <p class='body'>id                : {{ $user->id }}</p>
                    <p class='body'>name              : {{ $user->name }}</p>
                    <p class='body'>email             : {{ $user->email }}</p>
                    <p class='body'>admin             : {{ $user->admin_chk }}</p>
                    <p class='body'>email_verified_at : {{ $user->email_verified_at }}</p>
                    <p class='body'>created_at        : {{ $user->created_at }}</p>
                    <p class='body'>updated_at        : {{ $user->updated_at }}</p>
                    <hr>
                @endforeach
                
                <p class='body'>groupdata =</p>
                <hr>
                @foreach ($groups as $group)
                    <p class='body'>id         : {{ $group->id }}</p>
                    <p class='body'>name       : {{ $group->name }}</p>
                    <p class='body'>leader_id  : {{ $group->leader_id }}</p>
                    <p class='body'>created_at : {{ $group->created_at }}</p>
                    <p class='body'>updated_at : {{ $group->updated_at }}</p>
                    <hr>
                @endforeach
            </div>
        </div>
    </body>
</html>
