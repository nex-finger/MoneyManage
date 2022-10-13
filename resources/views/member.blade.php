<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<meta name="Description" content="*** ページの概要 ***" />
<meta name="Keywords" content="*** キーワード ***,*** キーワード ***,*** キーワード ***" />
<title>会計管理システム(仮)</title>

<!-- css 最後に書いた方が優先順位が高い -->
<link rel="stylesheet" href="/css/app.css" type="text/css" />
<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen,tv" />

</head>
<body>
<div id="header">
<div id="header-inner">
<!-- タイトル -->
<h1>メンバー一覧</h1>
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
<p class="topic-path"><a href="/">Home</a> &gt; <a href="/group">Group</a> &gt; {{ $leader }}</p>

<!-- コンテンツ ここから -->
<h2>{{ $leader }}のメンバー</h2>
@foreach($members as $member)
    <div class="float">
        <p>{{ $member->user->name }}</p>
    </div>
    <div class="right">
        <p class="massub" class="float">ユーザID : {{ $member->user->id }}</p>
    </div>
    <div class="right">
        <p class="massub" class="float">加入日時 : {{ $member->created_at }}</p>
    </div>
    <p class="clfloat space"></p>
@endforeach

<div class="float">
    <form action="/group/member/join/{{ $group_id }}" id="1" method="post">
        @csrf
        <p><input class="btn btn--blue btn--radius" type="button" value="加入する" onclick="OnButtonClickJoin()"/></p>
    </form>
    
    <form action="/group/member/leave/{{ $group_id }}" id="2" method="post">
        @csrf
        <p><input class="btn btn--orange btn--radius" type="button" value="脱退する" onclick="OnButtonClickLeave()"/></p>
    </form>
</form>
</div>
<p class="clfloat space"></p>
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
<p class="white">Copyright &copy; 2022 Masuda Mizuki(<a href="https://twitter.com/Classic_Gamepad">@Classic_Gamepad</a>) All Rights Reserved.</p>
<p id="cds">CSS Template <a href="http://www.css-designsample.com/">CSSデザインサンプル</a></p>
</div><!-- / footer-inner end -->
</div><!-- / footer end -->

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

</body>
</html>