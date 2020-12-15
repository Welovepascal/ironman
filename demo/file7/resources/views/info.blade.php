@extends('layout')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div> 
		@if($ten =="")
			{!!"Hãy nhập vào tên !" !!}
			
		@else
			Name : {!!$ten!!}
			<br>
			Birthday : {{$ngaysinh}}
			<br>
			Gender : {{$gioitinh}}
		@endif
	
	</div>
</body>
</html>
@stop