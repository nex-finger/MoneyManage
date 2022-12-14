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
<h1>予約選択</h1>
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
<p class="topic-path"><a href="/">Home</a> &gt; <a href="/mypage">Mypage</a> &gt; Order</p>

<!-- コンテンツ ここから -->
<h2>{{ $group['name'] }}の予約一覧</h2>
@foreach($reserves as $reserve)
    <div class="float">
        <p><a href="/mypage/order/{{ $reserve->id }}">{{ $reserve->places->name }}</a></p>
    </div>
    <div class="right">
        <p class="massub" class="float">予約ID : {{ $reserve->id }}</p>
    </div>
    <div class="right">
        <p class="massub" class="float">到着日時 : {{ $reserve->arrival }}</p>
    </div>
    <p class="clfloat space"></p>
@endforeach
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
