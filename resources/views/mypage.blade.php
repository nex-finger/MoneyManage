<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<meta name="Description" content="*** ページの概要 ***" />
<meta name="Keywords" content="*** キーワード ***,*** キーワード ***,*** キーワード ***" />
<title>会計管理システム(仮)</title>
<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen,tv" />
</head>
<body>
<div id="header">
<div id="header-inner">
<!-- タイトル -->
<h1>マイページ</h1>
<!-- タイトル -->
<p class="logo"><a href="/">会計管理システム(仮)</a></p>
<!-- 概要 -->
<p class="description">利用者それぞれの料金を可視化</p>
</div><!-- / header-inner end -->
</div><!-- / header end -->

<div id="container">
<div id="container-inner">
<div id="contents">
<!-- パン屑リスト -->
<p class="topic-path"><a href="index.html">Home</a> &gt; Mypage</p>

<!-- コンテンツ ここから -->
<h2>{{ $user['name'] }}さんのマイページ</h2>
<p></p>アカウント：{{ $user['name'] }}&nbsp;&#035;{{ $user['id'] }}</p>
<p>作成時間：{{ $user['created_at'] }}</p>
<p>メールアドレス：{{ $user['email'] }}</p>
<p>管理者権限：{{ $user['admin'] }}</p>

<h2>{{ $user['name'] }}さんが加入している団体</h2>
@foreach($ingroups as $ingroup)
    <p>団体名 : {{ $ingroup->group->name }}</p>
    <p>代表者氏名 : {{ $ingroup->group->leader_name }}</p>
    <p>[<a href="/group/member/{{ $ingroup->group->id }}">詳細（参加脱退はこちら）</a>]</p>
@endforeach

<h2>{{ $user['name'] }}さんが代表している団体</h2>
@foreach($mygroups as $mygroup)
    <p>団体名 : {{ $mygroup['name'] }}</p>
    <p>代表者氏名 : {{ $mygroup['leader_name'] }}</p>
    <p>[<a href="/group/member/{{ $mygroup->id }}">詳細（参加脱退はこちら）</a>]</p>

    <form action="/group/leave/{{ $mygroup->id }}" id='{{ $mygroup->id }}' method="post">
        @csrf
        <p><input type="button" value="削除する" onclick="OnButtonClickGroupLeave({{ $mygroup->id }})"/></p>
    </form>
@endforeach

<h2>団体新規作成</h2>
<p>[<a href="/group/create">新規作成(/group/create)</a>]</p>

<h2>{{ $user['name'] }}さんが代表している宿泊先</h2>
@foreach($myplaces as $myplace)
    <p>宿泊先 : {{ $myplace['name'] }}</p>
    <p>代表者氏名 : {{ $myplace['leader_name'] }}</p>
    <p >[<a href="/place/{{ $myplace->id }}">詳細（参加脱退はこちら）</a>]</p>
    
    <form action="/place/leave/{{ $myplace->id }}" id='{{ $myplace->id }}' method="post">
        @csrf
        <p><input type="button" value="削除する" onclick="OnButtonClickPlaceLeave({{ $myplace->id }})"/></p>
    </form>
@endforeach

<h2>宿泊先新規作成</h2>
    <p>[<a href="/place/create">新規作成(/place/create)</a>]</p>
<!-- コンテンツ ここまで -->
</div><!-- / contents end -->
</div><!-- / container-inner end -->

<div id="sidebar">
<!-- サイドバー ここから -->
@include('template', ['name' => $user])
<!-- サイドバー ここまで -->
</div><!-- / sidebar end -->

<div id="undernavi">
<!-- 自由に入力して下さい。 -->
<p><a href="/">トップページに戻る</a></p>

</div><!-- floar clear/ undernavi end -->
</div><!-- / container end -->
<div id="footer">
<div id="footer-inner">
<!-- コピーライト -->
<p>Copyright &copy; 2022 Masuda Mizuki(<a href="https://twitter.com/Classic_Gamepad">@Classic_Gamepad</a>) All Rights Reserved.</p>
<p id="cds">CSS Template <a href="http://www.css-designsample.com/">CSSデザインサンプル</a></p>
</div><!-- / footer-inner end -->
</div><!-- / footer end -->

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

</body>
</html>
