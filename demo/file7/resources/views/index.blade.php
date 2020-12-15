<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>Music Online</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src ="js/css3-mediaqueries.js"></script>
    <script type="text/javascript" href ="js/Search.js"></script>
    <link rel="stylesheet" href="css/style_menu.css" type="text/css">
    <link rel="stylesheet" href="css/slider.css">

  </head>
  <body data-vide-bg="video/snow" >
  	<div id="menu">
  		<div class="row">
  			<div class="col-md-12">
  				<nav class="navbar navbar-default" role="navigation"  >
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="{{ URL::to('/') }}">Music Online</a>
	            </div>
	            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-2">
	                <ul class="nav navbar-nav">
	                	<li><a href="{{ URL::to('home') }}">Trang chủ</a></li>
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bài hát<b class="caret"></b></a>
	                        <ul class="dropdown-menu multi-column columns-2">
	                            <li>
	                                <ul class="multi-column-dropdown col-sm-6">
	                                    <li><a href="{{URL::to('songnew')}}" >Nhạc mới</a></li>
	                                    <li><a href="{{ URL::to('songvn') }}">Nhạc Trẻ</a></li>
	                                    <li><a href="{{ URL::to('trutinh') }}">Trữ Tình</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Rock Việt</a></li>
	                                    <li><a href="#">Rap Việt</a></li>
	                                </ul>
	                            </li>
	                            <li>
	                                <ul class="multi-column-dropdown col-sm-6">
	                                    <li><a href="#">Nhạc Hoa</a></li>
	                                    <li><a href="{{ URL::to('songuk') }}">Âu Mỹ</a></li>
	                                    <li><a href="#">Nhạc Hàn</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Hòa Tấu </a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Thể Loại Khác</a></li>
	                                </ul>
	                            </li>
	                        </ul>
	                    </li>
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Playlist<b class="caret"></b></a>
	                        <ul class="dropdown-menu multi-column columns-2">
	                            <li>
	                                <ul class="multi-column-dropdown col-sm-6">
	                                    <li><a href="#">Mới - Hot</a></li>
	                                    <li><a href="#">Nhạc Trẻ</a></li>
	                                    <li><a href="#">Trữ Tình</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Rock Việt</a></li>
	                                    <li><a href="#">Rap Việt</a></li>
	                                </ul>
	                            </li>
	                            <li>
	                                <ul class="multi-column-dropdown col-sm-6">
	                                    <li><a href="#">Nhạc Hoa</a></li>
	                                    <li><a href="#">Âu Mỹ</a></li>
	                                    <li><a href="#">Nhạc Hàn</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Hòa Tấu </a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Thể Loại Khác</a></li>
	                                </ul>
	                            </li>
	                        </ul>
	                    </li>
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chủ đề <b class="caret"></b></a>
	                        <ul class="dropdown-menu multi-column columns-3">
	                            <li>
	                                <ul class="multi-column-dropdown col-sm-4 col-xs-12">
	                                    <li><a href="#">The Best Of 2017</a></li>
	                                    <li><a href="#">Coffe Time</a></li>
	                                    <li><a href="#">Acoustic</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Cover - Mashup</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Do You Travel</a></li>
	                                </ul>
	                            </li>
	                            <li>
	                                <ul class="multi-column-dropdown col-sm-4 col-xs-12">
	                                    <li><a href="#">Nhạc Xuân</a></li>
	                                    <li><a href="#">Nhạc Vàng</a></li>
	                                    <li><a href="#">Cải Lương</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Nhạc V-POP</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Nhạc K-POP</a></li>
	                                </ul>
	                            </li>
	                            <li>
	                                <ul class="multi-column-dropdown col-sm-4 col-xs-12">
	                                    <li><a href="#">EDM Sôi Động</a></li>
	                                    <li><a href="#">Nhạc Remix</a></li>
	                                    <li><a href="#">Nonstop</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Electronic</a></li>
	                                    <li class="divider"></li>
	                                    <li><a href="#">Tin tức âm nhạc</a></li>
	                                </ul>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
	                <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <!-- <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li> -->
                        @else
                            <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý<b class="caret"></b></a>
		                        <ul class="dropdown-menu multi-column columns-1">
		                            <li>
		                                <ul class="multi-column-dropdown col-sm-8">
		                                    <li><a href="{{ URL::to('musics') }}">Bài hát</a></li>
		                                    <li class="divider"></li>
		                                    <li><a href="{{ URL::to('singers') }}">Ca sĩ</a></li>
		                                    <li class="divider"></li>
		                                    <li><a href="{{ URL::to('artists') }}">Nhạc sĩ</a></li>
		                                </ul>
		                            </li>
		                        </ul>
		                    </li>
                        @endif
                    </ul> <!-- END_urQuanLy -->
	                <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }} " >Login</a></li>
                            <li><a href="{{ url('/register') }}" >Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul> <!-- END_urLOGIN -->
	                <div class="row">    
						<div class="input-group" style="margin-top: 10px;padding-left: 50px; ">
				                <div class="input-group-btn search-panel">
				                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				                    	<span id="search_concept">Tìm kiếm theo</span> <span class="caret"></span>
				                    </button>
				                    <ul class="dropdown-menu" role="menu">
				                      <li><a href="#contains">Bài hát</a></li>
				                      <li><a href="#its_equal">Ca sĩ</a></li>
				                      <li><a href="#greather_than">Album</a></li>
				                      <li><a href="#less_than">Playlist</a></li>
				                      <li class="divider"></li>
				                      <li><a href="#all">Tất cả</a></li>
				                    </ul>
				                </div>
				                <input type="hidden" name="search_param" value="all" id="search_param">         
				                <input type="text" class="form-control" name="x" placeholder="Search term...">
				                <span class="input-group-btn">
				                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
				                </span>
				            </div>
					</div>
	            </div>
	            <!--/.navbar-collapse-->
	        </nav>
  			</div>
  		</div>
  	</div> <!-- menu -->
  	<div class="container">
  		<div class="row">
	  		<div class="col-md-9">
	  			<div class="example">
		            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  				<!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
						    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src="img/pic1.jpg" alt="city" >
						    </div>
						    <div class="item">
						      <img src="img/pic2.jpg" alt="city2" >
						    </div>
						    <div class="item">
						      <img src="img/pic3.jpg" alt="city3">
						    </div>
						    <div class="item">
						      <img src="img/pic4.jpg" alt="city4"  >
						    </div>
						    <div class="item">
						      <img src="img/pic5.jpg" alt="city5" >
						    </div>
						    ...
						  </div>

						  <!-- Controls -->
						  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
					</div>	
		        </div> <!-- /SLIDE -->
	  		</div>
	  		<div class="col-md-3" id="bxh" style="margin-top: 2px;">
	  			<div class="thumbnail" style="border-color: blue;">
	  				<a href="#"> <h3 style="text-align: center;color: blue;">BẢNG XẾP HẠNG</h3></a> <hr>
		  				<div class="caption">
		  					<h5><a href="" target="_blank" style="color: black;"><strong style="color: red;">01.</strong> Lập trình tình yêu</a></h5>
		  				</div>
		  				<div class="caption">
		  					<h5><a href="" target="_blank" style="color: black;"><strong style="color: green;">02.</strong> Em ơi</a></h5>
		  				</div>
		  				<div class="caption">
		  					<h5 ><a href="" target="_blank" style="color: black;"><strong style="color: yellow;">03.</strong> Nơi này có anh</a></h5>
		  				</div>
		  				<div class="caption">
		  					<h5><a href="" target="_blank" style="color: black;">04. Lá vàng rơi gió</a></h5>
		  				</div>
		  				<div class="caption">
		  					<h5><a href="" target="_blank" style="color: black;">05. Ta là cho nhau</a></h5>
		  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	@yield('content')
	  	<div class="row">
	  		<div class="col-md-9">
	  			<hr style="border-color: white;"> <a href="#"><h3 style="color: blue;"> ALBUM HOT</h3> </a>
	  			<hr style="border-color: white;">
	  			<div class="row">
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/al1.jpg" alt="album1">
		  					</a>
	  					</div>
	  				</div>
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/al2.jpg" alt="album2">
		  					</a>
	  					</div>
	  				</div>
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/al3.jpg" alt="album3">
		  					</a>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-md-3">
	  			<div class="thumbnail" style="margin-top: 20px;border-color: green;">
	  				<h3 align="center"><a href="">CHỦ ĐỀ HOT</a></h3>
	  				<hr>
	  				<div class="row" style="margin-bottom: 7px;">
	  					<a href="">
	  						<img src="img/cd1.jpg" alt="" width="90%;" >
	  					</a>
	  				</div>
	  				<div class="row" style="margin-bottom: 7px;">
	  					<a href="">
	  						<img src="img/cd2.jpg" alt="" width="90%">
	  					</a>
	  				</div>
	  				<div class="row" style="margin-bottom: 7px;">
	  					<a href="">
	  						<img src="img/cd3.jpg" alt="" width="90%">
	  					</a>
	  				</div>
	  				<div class="row" style="margin-bottom: 7px;">
	  					<a href="">
	  						<img src="img/cd4.jpg" alt="" width="90%">
	  					</a>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col-md-9">
	  			<hr><a href="#"> <h3 style="color: blue;"> MV HOT</h3></a> <hr>
	  			<div class="row">
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/mv1.jpg" alt="mv1">
		  					</a>
	  					</div>
	  				</div>
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/mv2.jpg" alt="mv2">
		  					</a>
	  					</div>
	  				</div>
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/mv3.jpg" alt="mv3">
		  					</a>
	  					</div>
	  				</div>
	  			</div>
	  			<div class="row">
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/mv4.jpg" alt="mv4">
		  					</a>
	  					</div>
	  				</div>
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/mv5.jpg" alt="mv5">
		  					</a>
	  					</div>
	  				</div>
	  				<div class="col-md-4">
	  					<div class="thumbnail">
	  						<a href="">
		  						<img src="img/mv6.jpg" alt="mv6">
		  					</a>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-md-3" style="margin-top: 20px;">
	  			<div class="thumbnail" style="border-color: #001100;">
	  				<a href="#"> <h3 style="text-align: center;color: blue;">BÁO ĐIỆN TỬ</h3></a> <hr>
		  				<div class="caption">
		  					<h5><a href="" target="_blank" style="color: black;"><strong style="color: red;">Tin tức 24h</strong> </a></h5>
		  				</div>
		  				<div class="caption">
		  					<h5><a href="" target="_blank" style="color: black;"><strong style="color: green;">Tin nhanh VnExpress</strong> </a></h5>
		  				</div>
		  				<div class="caption">
		  					<h5 ><a href="" target="_blank" style="color: black;"><strong style="color: #FFCC33;">Báo dân trí</strong> </a></h5>
		  				</div>
		  				<div class="caption">
		  					<h5 ><a href="" target="_blank" style="color: black;"><strong style="color: #66CC00;">Báo VietNamNet</strong> </a></h5>
		  				</div>
	  			</div>
	  			<hr>
	  		</div>
	  	</div>
  	</div>
	<div id="player">
	    <audio controls autoplay hidden>
	     <source src="{{URL::asset('uploads/music.mp3')}}" type="audio/mpeg">
	                unsupported !! 
	    </audio>
	</div>
  	<div class="panel panel-primary" >
		<div class="panel-footer" style="background-color: #FAFAD2">
			<div class="container">
				<div class="caption">
					<p style="text-align: center;color: blue;">Copyright (@) AJAX TEAM</p>
				</div>
			</div>
		</div>
	</div>	
	<script src="/js/app.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
  </body>
</html>