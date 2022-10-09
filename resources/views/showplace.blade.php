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
                <h2 class='title'>宿泊先新規作成</h2>
                <p class='body'>[<a href="/place/create">新規作成(/place/create)</a>]</p>
            </div>
            <div class='body'>
                <h2 class='title'>宿泊先一覧</h2>
                <p class='body'>id : {{ $place['id'] }}</p>
                <p class='body'>宿泊先 : {{ $place['name'] }}</p>
                <p class='body'>代表者id : {{ $place['leader_id'] }}</p>
                <p class='body'>代表者名前 : {{ $place['leader_name'] }}</p>
                <p class='body'>住所 : {{ $place['address'] }}</p>
                <p class='body'>基本料金 : {{ $place['value'] }}</p>
                <!--
                <p class='body'>緯度 : {{ $lat }}</p>
                <p class='body'>経度 : {{ $lng }}</p>
                !-->
                <p class='body'>作成時間 : {{ $place['created_at'] }}</p>
            </div>
            
            <div id="map" style="height:500px">
                
	        </div>
	        <script>
	        const lat = @json($lat);
	        const lng = @json($lng);
	        const placename = @json($placename);
	            
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
	        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCcw2cN6DCE-NeANgOPo6ChK1KbXv8Go3U&callback=initMap" async defer></script>
            
            <div class='body'>
                <p class="edit">[<a href="/place/aaa/{{ $place->id }}">予約する</a>]</p>
                <hr>
            </div>
        </div>
        @include('template', ['name' => $user])
    </body>
</html>