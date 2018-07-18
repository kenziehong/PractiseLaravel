<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Khoa pham @yield('sub')</title>
	<link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
	 
</head>
<body>
	<div id="wapper">
		<div id="header">
			@section('slidebar')
			Đây là Menu
			@show
		</div>
		<div id="content">
			@yield('noidung')
		</div>
		<div id="footer"></div>
	</div>	
	
</body>
</html>