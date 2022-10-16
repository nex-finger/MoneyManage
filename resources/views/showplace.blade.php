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
<h1>宿泊先詳細</h1>
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
<p class="topic-path"><a href="/">Home</a> &gt; <a href="/place">Place</a> &gt; {{ $place->name }}</p>

<!-- コンテンツ ここから -->
<h2>{{ $place->name }}</h2>

<div class="float">
    <p class>代表者 : {{ $place['leader_name'] }}</p>
    <p class>住所 : {{ $place['address'] }}</p>
    <p class>基本料金 : ¥{{ $place['value'] }}</p>
</div>
<div class="right">
    <p class="massub" class="float">ユーザID : {{ $place['leader_id'] }}</p>
</div>
<div class="right">
    <p class="massub" class="float">作成日時 : {{ $place['created_at'] }}</p>
</div>
<p class="clfloat space"></p>

<!--
<p class='body'>緯度 : {{ $lat }}</p>
<p class='body'>経度 : {{ $lng }}</p>
!-->

<div class='body'>
    <p class="edit"></p><a href="/place/reserve/{{ $place->id }}">予約する</a></p>
</div>
<p class="clfloat space"></p>

<div id="map" class="map" style="height:500px"></div>

@foreach($images as $image)
    <img src="{{ Storage::url($image->image) }}">
@endforeach
<p class="clfloat space"></p>

<div class='body'>
    <p class="edit"><a href="/place/reserve/{{ $place->id }}">予約する</a></p>
</div>

<p class="clfloat space"></p>

<h2>宿泊先新規作成</h2>
<p><a href="/place/create">新規作成</a></p>
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
const lat = @json($lat);
const lng = @json($lng);
const placename = @json($placename);
const api_key = {{ config('services.map.key') }};
    
//console.log(lat);
//console.log(lng);
    
// googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
function initMap() {
    // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
    map = document.getElementById("map");
    // 東京タワーの緯度は35.6585769,経度は139.7454506と事前に調べておいた
    let placement = {lat: lat, lng: lng};
    // オプションを設定
    opt = {
        zoom: 13, //地図の縮尺を指定
        center: placement, //センターを東京タワーに指定
    };
    // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
    mapObj = new google.maps.Map(map, opt);
    
    marker = new google.maps.Marker({
        // ピンを差す位置を決めます。
        position: placement,
	      // ピンを差すマップを決めます。
        map: mapObj,
	      // ホバーしたときに「tokyotower」と表示されるようにします。
        title: placename,
    });
}
</script>

<script src={{ $api }} async defer></script>

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


<!-- APIキーを指定してjsファイルを読み込む -->
<!--
<script async src={{ $api }}></script>
<script type="text/javascript">
// Google Mapを表示する関数
function initMap() {
  const geocoder = new google.maps.Geocoder();
  // ここでaddressのvalueに住所のテキストを指定する
  geocoder.geocode( { address: {{ $place->address }}}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      const latlng = {
        lat: results[0].geometry.location.lat(),
        lng: results[0].geometry.location.lng()
      }
      const opts = {
        zoom: 15,
        center: new google.maps.LatLng(latlng)
      }
      const map = new google.maps.Map(document.getElementById('map'), opts)
      new google.maps.Marker({
        position: latlng,
        map: map 
      })
    } else {
      console.error('Geocode was not successful for the following reason: ' + status)
    }
  })
}
</script>
-->

</body>
</html>