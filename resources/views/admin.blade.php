<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- CSS -->
        <style type="text/css">
        body {
            font-size: 12px;
            font-family: sans-serif;
            font-smoothing: none;
        }
        
        table {
            border-collapse: collapse;
            white-space: nowrap;
        }
        
        table th {padding: 10px 20px;}
        
        table td {
            padding: 0px 20px;
            height: 1.2rem;
        }
        
        hr {margin: 20px 0px;}
        </style>
        
    </head>
    <body>
        <h1>Test Page</h1>
        <div class='testid'>
            <div class='post'>
                <h2 class='title'>データベース情報全件表示</h2>
                <p class='body'>管理者権限保持者のみ閲覧可能</p>
                <p class='body'>動作が重くなることがあります</p>
                
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
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at }}</td>
                            <td>{{ $user->admin_chk }}</td>
                            <td>{{ $user->remember_token }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
                <p class='body'>※カラム"password"は暗号化されているので表示しない</p>
                
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
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->leader_id }}</td>
                        <td>{{ $group->leader_name }}</td>
                        <td>{{ $group->created_at }}</td>
                        <td>{{ $group->updated_at }}</td>
                    </tr>
                @endforeach
                </table>
                <p class='body'>leader_id は users->id とリレーション</p>
                <p class='body'>leader_name は users->name とリレーション</p>
                
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
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->user_id }}</td>
                        <td>{{ $member->group_id }}</td>
                        <td>{{ $member->created_at }}</td>
                        <td>{{ $member->updated_at }}</td>
                    </tr>
                @endforeach
                </table>
                <p class='body'>user_id は users->id とリレーション</p>
                <p class='body'>group_id は groups->id とリレーション</p>
                
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
                        <td>{{ $place->id }}</td>
                        <td>{{ $place->name }}</td>
                        <td>{{ $place->leader_id }}</td>
                        <td>{{ $place->leader_name }}</td>
                        <td>{{ $place->address }}</td>
                        <td>{{ $place->value }}</td>
                        <td>{{ $place->lat }}</td>
                        <td>{{ $place->lng }}</td>
                        <td>{{ $place->created_at }}</td>
                        <td>{{ $place->updated_at }}</td>
                    </tr>
                @endforeach
                </table>
                <p class='body'>leader_id は users->id とリレーション</p>
                <p class='body'>leader_name は users->name とリレーション</p>
                
                <hr>
                
                <h3 class='body'>table "options"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>place_id</th>
                        <th>name</th>
                        <th>value</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                @foreach ($options as $option)
                    <tr>
                        <td>{{ $option->id }}</td>
                        <td>{{ $option->place_id }}</td>
                        <td>{{ $option->name }}</td>
                        <td>{{ $option->value }}</td>
                        <td>{{ $option->created_at }}</td>
                        <td>{{ $option->updated_at }}</td>
                    </tr>
                @endforeach
                </table>
                <p class='body'>place_id は places->id とリレーション</p>
                
                <hr>
                
                <h3 class='body'>table "pictures"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>place_id</th>
                        <th>image</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                @foreach ($pictures as $picture)
                    <tr>
                        <td>{{ $picture->id }}</td>
                        <td>{{ $picture->place_id }}</td>
                        <td>{{ $picture->image }}</td>
                        <td>{{ $picture->created_at }}</td>
                        <td>{{ $picture->updated_at }}</td>
                    </tr>
                @endforeach
                </table>
                <p class='body'>place_id は places->id とリレーション</p>
                
                <hr>
                
                <h3 class='body'>table "reserves"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>place_id</th>
                        <th>group_id</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                @foreach ($reserves as $reserve)
                    <tr>
                        <td>{{ $reserve->id }}</td>
                        <td>{{ $reserve->place_id }}</td>
                        <td>{{ $reserve->group_id }}</td>
                        <td>{{ $reserve->created_at }}</td>
                        <td>{{ $reserve->updated_at }}</td>
                    </tr>
                @endforeach
                </table>
                <p class='body'>place_id は places->id とリレーション</p>
                <p class='body'>group_id は groups->id とリレーション</p>
                
                <hr>
                
                <h3 class='body'>table "orders"</h3>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>user_id</th>
                        <th>reserve_id</th>
                        <th>option_id</th>
                        <th>pcs</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->reserve_id }}</td>
                        <td>{{ $order->option_id }}</td>
                        <td>{{ $order->pcs }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                    </tr>
                @endforeach
                </table>
                <p class='body'>user_id は users->id とリレーション</p>
                <p class='body'>reserve_id は reserves->id とリレーション</p>
                <p class='body'>option_id は options->id とリレーション</p>
            </div>
        </div>
        @include('template')
    </body>
</html>