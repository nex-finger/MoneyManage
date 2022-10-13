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
<h1>予約ページ</h1>
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
<p class="topic-path"><a href="/">Home</a> &gt; <a href="/place">Place</a> &gt; <a href="/place/{{ $place->id }}">{{ $place->name }}</a> &gt; Reserve</p>

<!-- コンテンツ ここから -->
<h2>{{ $place->name }}の予約</h2>

<form action="/place/reserve/{{ $place_id }}" method="POST">
    @csrf
    <div class="float">
        <p>グループを指定(自分が代表のグループから指定)</p>
        @foreach($groups as $group)
        <p><input type="radio" name="group" value="{{ $group['id'] }}"> {{ $group['name'] }}</p>
        @endforeach
        <p class="space"></p>
        
        <p>到着日時を指定</p>
        <p><input type="date" name="arrival"></p>
        <p class="space"></p>
    </div>
    <p class="clfloat space"></p>
    <input class="btn btn--blue btn--radius" type="submit" value="予約を確定"/>
</form>

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
