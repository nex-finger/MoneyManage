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
                        <td><p class='body'>{{ $member->user->id }}</p></td>
                        <td><p class='body'>{{ $member->user->name }}</p></td>
                    </tr>
                    @endforeach
                </table>
                
                <div class="title">
                    <h2>加入脱退</h2>
                </div>
                
                <form action="/group/member/join/{{ $group_id }}" id="1" method="post">
                    @csrf
                    <p><input type="button" value="加入する" onclick="OnButtonClickJoin()"/></p>
                </form>
                
                <form action="/group/member/leave/{{ $group_id }}" id="2" method="post">
                    @csrf
                    <p><input type="button" value="脱退する" onclick="OnButtonClickLeave()"/></p>
                </form>
                
            </div>
            
            <script>
            const id = {{ $user->id }};
            const idlist = @json($memberarr);
            
            function OnButtonClickJoin() {
                if(idlist.includes(id)) {
                    window.alert('既に加入しているため，処理を実行できませんでした');
                } else {
                    window.alert('加入処理を実行します．');
                    document.getElementById(1).submit();
                }
            }
            
            function OnButtonClickLeave() {
                if(idlist.includes(id)) {
                    window.alert('脱退処理を実行します．');
                    document.getElementById(2).submit();
                } else {
                    window.alert('元から加入していないため，処理を実行できませんでした．');
                }
            }
                
            </script>
        </div>
        @include('template', ['name' => $user])
    </body>
</html>
