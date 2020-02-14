<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<title>@yield('baslik')</title>
</head>
		<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
<body>
	<div class="container-fluid">
		<div class="row">
			
        
	        <div class="col" align="center">
	            <div style="text-align: center">
	                <div style="font-size: 33px,margin-bottom: 30px;">
	                    <span style="font-size: 84px">Kütüphanem</span>
	                </div>

	                <div class="links">
	                    <a href="{{ URL::to('kitaplar') }}">Kitaplarım</a>
	                    <a href="{{ URL::to('yazarlar') }}">Yazarlar</a>
	                    <a href="{{ URL::to('kisiler') }}">Kişiler</a>
	                    <a href="{{ URL::to('islemler') }}">İslemler</a>
	                </div>
	            </div>
	        </div>

		</div>
		<!--
		<div class="row">
			<div class="col" align="center">	
				<a href="{{URL::to('/kitaplar')}}">Kitaplarım</a>
				<a href="{{URL::to('/yazarlar')}}">Yazarlar</a>
				<a href="{{URL::to('/kisiler')}}">Kişiler</a>
				<a href="{{URL::to('/islemler')}}">İslemler</a>
			</div>
		</div>
	-->
	<div class="row-fluid" style="margin-top: 30px">
		@yield('icerik')
	</div>
	</div>
</body>
</html>