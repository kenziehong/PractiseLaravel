@extends('layouts.master')


@section('noidung')

	Đây là trang sub 1

	<br/>

	<?php $diem=10; $hoten="<b>Khoa Pham Training<b>"?>

	@if($diem<=5)
		Học sinh Yếu
	@elseif($diem<=5 && $diem>=7)
		Học sinh Trung Bình
	@else
		Học sinh Giỏi
	@endif

	<br/>

	{{ isset($diem) ? $diem : 'Không tồn tại điểm' }}

	<hr/>

	{{ $diem or 'Không tồn tại điểm' }}

	<hr/>

	{{$hoten}}

	<hr/>

	{!!$hoten!!}

	<hr/>

	@for($i=0; $i<=10; $i++)
		Số thứ tự: {{$i}} <br/>
	@endfor

	<hr/>

	<?php $i=0; ?>

	@while($i<=10)
		
		Số thứ tự: {{$i}} <br/>
		<?php $i++ ?>
	@endwhile

	<?php $array=["cơm","cháo","phở"]; ?>

	@foreach($array as $key)
		{{$key}},
	@endforeach

@stop


@section('sub','Title sub 1')

@section('slidebar')
	Nằm phía trước
	@parent
@stop

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> <?php echo $titlesub?> </title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	@include('layouts.marquee',['marquee_content'=>'Lap trinh Laravel'])

	<table border="1px">
		<tr>
			<td>1</td>
			<td>Lap trinh PHP</td>
		</tr>

		<tr>
			<td>2</td>
			<td>Lap trinh Java</td>
		</tr>

		<tr>
			<td>3</td>
			<td>Lap trinh Python</td>
		</tr>

		<tr>
			<td>4</td>
			<td>Lap trinh JavaScript</td>
		</tr>
	</table>

	<?php echo $thongtin;?>
	
</body>
</html>