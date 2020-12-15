@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body >
	<div class="container">
			<div class="row">
				<table class="table table-hover">
					<thead>
						<tr>
							<td colspan="6"><h3><a href="">BÀI HÁT NHẠC TRẺ</a></h3></td>
						</tr>
						<tr style="background-color: #2E8B57;">
							<td style="color: white;font-weight: bold;">Bài hát</td>
							<td style="color: white;font-weight: bold;">Sáng tác</td>
							<td style="color: white;font-weight: bold;">Ca sĩ</td>
							<td style="color: white;font-weight: bold;">Thể loại</td>
							<td style="color: white;font-weight: bold;">Năm</td>
							<td style="color: white;font-weight: bold;">Quốc gia</td>
						</tr>
					</thead>
					<tbody>
						@foreach($v_song as $song)
							<tr>
								<td><a href="{{ URL ::to('songvn/'.$song->id)}}">{!! $song->original_filename !!}</a></td>
								<td>{{ $song->artist }}</td>
								<td>{{ $song->singer }}</td>
								<td>{{ $song->type }}</td>
								<td>{{ $song->year }}</td>
								<td>{{ $song->country }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $v_song->render() !!}
			</div>
	</div>
</body>
</html>
@stop