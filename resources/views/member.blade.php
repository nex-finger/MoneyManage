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
                <table border>
                    <tr>
                        <th><p class='body'>ID</p></th>
                        <th><p class='body'>氏名</p></th>
                    </tr>
                    @foreach($members as $member)
                    <tr>
                        <th><p class='body'>{{ $member->user->id }}</p></th>
                        <th><p class='body'>{{ $member->user->name }}</p></th>
                    </tr>
                    @endforeach
                </table>
                
                <div class="title">
                    <h2>加入脱退</h2>
                </div>
                <p><input type="button" value="加入する" onclick="OnButtonClickJoin()"/></p>
                <p><input type="button" value="脱退する" onclick="OnButtonClickLeave()"/></p>
            </div>
            
            <script>
            const id = {{ $user->id }};
            const idlist = {{ $member->user->id }};
            
            function OnButtonClickJoin() {
                if(idlist.includes(id)) {
                    window.alert('既に加入しています');
                } else {
                    window.alert('加入処理');
                }
            }
            
            function OnButtonClickLeave() {
                if(idlist.includes(id)) {
                    window.alert('脱退処理');
                } else {
                    window.alert('加入していない団体から脱退することはできません');
                }
            }
                
            </script>
        </div>
        @include('template', ['name' => $user])
    </body>
</html>
