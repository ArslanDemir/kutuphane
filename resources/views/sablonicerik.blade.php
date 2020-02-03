<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>@yield('baslik')</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col" align="center">	
				<a href="{{URL::to('/kitaplar')}}">Kitaplarım</a>
				<a href="{{URL::to('/yazarlar')}}">Yazarlar</a>
				<a href="{{URL::to('/kisiler')}}">Kişiler</a>
				<a href="{{URL::to('/islemler')}}">İslemler</a>
			</div>
		</div>
	<hr>
	@yield('icerik')
	</div>
</body>
</html>