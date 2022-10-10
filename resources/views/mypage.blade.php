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
            <div class='body'>
                <h2 class='title'>マイページ</h2>
                <h3 class='body'>ログインしたユーザの情報</h3>
                <p class='body'>あなたの</p>
                <p class='body'>idは         : {{ $user['id'] }}</p>
                <p class='body'>ユーザ名は   : {{ $user['name'] }}</p>
                <p class='body'>メールは     : {{ $user['email'] }}</p>
                <p class='body'>作成時間は   : {{ $user['created_at'] }}</p>
                <p class='body'>管理者権限は : {{ $user['admin'] }}</p>
                <p class='body'>です.</p>
            </div>
            <div class='body'>
                <h3 class='body'>{{ $user['name'] }}さんが加入している団体</h3>
                
                @foreach($ingroups as $ingroup)
                    <p class='body'>団体名 : {{ $ingroup->group->name }}</p>
                    <p class='body'>代表者氏名 : {{ $ingroup->group->leader_name }}</p>
                    <p class="edit">[<a href="/group/member/{{ $ingroup->group->id }}">詳細（参加脱退はこちら）</a>]</p>
                    <hr>
                @endforeach
                
                <h3 class='body'>{{ $user['name'] }}さんが代表している団体</h3>
                
                @foreach($mygroups as $mygroup)
                    <p class='body'>団体名 : {{ $mygroup['name'] }}</p>
                    <p class='body'>代表者氏名 : {{ $mygroup['leader_name'] }}</p>
                    <p class="edit">[<a href="/group/member/{{ $mygroup->id }}">詳細（参加脱退はこちら）</a>]</p>
                    
                    <form action="/group/leave/{{ $mygroup->id }}" id='{{ $mygroup->id }}' method="post">
                        @csrf
                        <p><input type="button" value="削除する" onclick="OnButtonClickGroupLeave({{ $mygroup->id }})"/></p>
                    </form>
                
                    <hr>
                @endforeach
                
                <h3 class='title'>団体新規作成</h3>
                <p class='body'>[<a href="/group/create">新規作成(/group/create)</a>]</p>
                <hr>
                
                <h3 class='body'>{{ $user['name'] }}さんが代表している宿泊先</h3>
                
                @foreach($myplaces as $myplace)
                    <p class='body'>宿泊先 : {{ $myplace['name'] }}</p>
                    <p class='body'>代表者氏名 : {{ $myplace['leader_name'] }}</p>
                    <p class="edit">[<a href="/place/{{ $myplace->id }}">詳細（参加脱退はこちら）</a>]</p>
                    
                    <form action="/place/leave/{{ $myplace->id }}" id='{{ $myplace->id }}' method="post">
                        @csrf
                        <p><input type="button" value="削除する" onclick="OnButtonClickPlaceLeave({{ $myplace->id }})"/></p>
                    </form>
                    
                    <hr>
                @endforeach
                
                <h3 class='title'>宿泊先新規作成</h3>
                <p class='body'>[<a href="/place/create">新規作成(/place/create)</a>]</p>
                <hr>
                
            </div>
        </div>
        @include('template')
    </body>
    
    <script>
    function OnButtonClickGroupLeave(id) {
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(id).submit();
        }
    }
    
    function OnButtonClickPlaceLeave(id) {
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(id).submit();
        }
    }
    </script>
</html>
