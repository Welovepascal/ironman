<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Them Bai Viet Moi</h1>
	{!! Form::open() !!}
 		{!! Form::label('name','Name:') !!}
		{!! Form::text('name') !!} <br />
  		{!! Form::label('author','Author:') !!}
		{!! Form::text('author') !!} </br>
 
		{!! Form::submit('Them moi')!!}
	{!! Form::close() !!}
</body>
</html>