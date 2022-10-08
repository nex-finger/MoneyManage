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
                <p class='body'>管理者権限保持者のみ閲覧可能</p>
                
                <hr>
                
                <h3 class='body'>table "users"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>email_verified_at</th>
                        <th>admin_chk</th>
                        <th>remember_token</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->email_verified_at }}</th>
                            <th>{{ $user->admin_chk }}</th>
                            <th>{{ $user->remember_token }}</th>
                            <th>{{ $user->created_at }}</th>
                            <th>{{ $user->updated_at }}</th>
                        </tr>
                    @endforeach
                </table>
                
                <hr>
                
                <h3 class='body'>table "places"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>leader_id</th>
                        <th>leader_name</th>
                        <th>address</th>
                        <th>value</th>
                        <th>lat</th>
                        <th>lng</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                @foreach ($places as $place)
                    <tr>
                        <th>{{ $place->id }}</th>
                        <th>{{ $place->name }}</th>
                        <th>{{ $place->leader_id }}</th>
                        <th>{{ $place->leader_name }}</th>
                        <th>{{ $place->address }}</th>
                        <th>{{ $place->value }}</th>
                        <th>{{ $place->lat }}</th>
                        <th>{{ $place->lng }}</th>
                        <th>{{ $place->created_at }}</th>
                        <th>{{ $place->updated_at }}</th>
                    </tr>
                @endforeach
                </table>
                
                <hr>
                
                <h3 class='body'>table "groups"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>leader_id</th>
                        <th>leader_name</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                @foreach ($groups as $group)
                    <tr>
                        <th>{{ $group->id }}</th>
                        <th>{{ $group->name }}</th>
                        <th>{{ $group->leader_id }}</th>
                        <th>{{ $group->leader_name }}</th>
                        <th>{{ $group->created_at }}</th>
                        <th>{{ $group->updated_at }}</th>
                    </tr>
                @endforeach
                </table>
                
                <hr>
                
                <h3 class='body'>table "members"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>user_id</th>
                        <th>group_id</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                @foreach ($members as $member)
                    <tr>
                        <th>{{ $member->id }}</th>
                        <th>{{ $member->user_id }}</th>
                        <th>{{ $member->group_id }}</th>
                        <th>{{ $member->created_at }}</th>
                        <th>{{ $member->updated_at }}</th>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
        @include('template')
    </body>
</html>
