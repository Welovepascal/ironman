@extends('layout')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- {!!Html::ul($errors->all(),array('class'=>'errors'))!!} -->
	{!! Form::open() !!}
	 		{!! Form::label('name','Name:') !!}
			{!! Form::text('ten') !!} <br />
	  		{!! Form::label('birtday','Birthday:') !!}
			{!! Form::text('ngaysinh') !!} </br>
			{!! Form::label ('Gender : ') !!}
			{!! Form::label ('Nam') !!}
			{!! Form::radio('gioitinh','Nam')!!}
			{!! Form::label (' Nữ') !!}
			{!! Form::radio('gioitinh',' Nữ ')!!} </br>
			{!! Form::submit('Insert')!!}
	{!! Form::close() !!}

</body>
</html>
@stop