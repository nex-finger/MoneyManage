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
<h1>グループ一覧</h1>
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
<p class="topic-path"><a href="/">Home</a> &gt; Group</p>

<!-- コンテンツ ここから -->
<h2>グループ一覧</h2>
@foreach($groups as $group)
    <div class="float">
        <p class><a href="/group/member/{{ $group->id }}">{{ $group->name }}</a></p>
    </div>
    <div class="right">
        <p class="massub" class="float">代表者 : {{ $group->leader_name }}</p>
    </div>
    <div class="right">
        <p class="massub" class="float">作成日時 : {{ $group->created_at }}</p>
    </div>
    <p class="clfloat space"></p>
@endforeach

<!-- ページネーション -->
<p>{{ $groups->links() }}</p>
<p class="clfloat space"></p>

<h2>グループ新規作成</h2>
<p><a href="/group/create">新規作成</a></p>
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

</body>
</html>
