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
    <style type="text/css">
    	 @media (min-width:900px) {
                .dropdown:hover .dropdown-menu {
                    display: block;

                }   
                .dropdown .dropdown-menu{
                    display: none;
                }

            }
			#menu{
				border-top: #8B8B00 solid 1px;
			}
            .navbar-default{
                background: none;
                padding: 0px;
                border-width: 0px 0px 5px 0px;
                border-color: #009431;
                border-radius: 0px;              
            }

            .dropdown-toggle:hover{               
                color: #FFFFFF;
            }


            .dropdown-menu {
                min-width: 200px;
            }
            .dropdown-menu.columns-2{
                min-width: 500px;
            }
            .dropdown-menu.columns-3 {
                min-width: 600px;
            }
            .dropdown-menu li a {
                padding: 5px 15px;
                font-weight: 300;
            }
            .multi-column-dropdown {
                list-style: none;
            }
            .multi-column-dropdown li a {
                display: block;
                clear: both;
                line-height: 1.428571429;
                color: #333;
                white-space: normal;
            }
            .multi-column-dropdown li a:hover {
                text-decoration: none;
                color: #262626;
                background-color: #f5f5f5;
            }
            .navbar-nav > li > .dropdown-menu{
                margin-top: 3px;
            }
            .navbar-default .navbar-nav > li > a {
                color: #777;               
                padding-top: 15px;
                padding-bottom: 19px;
                margin-bottom: -4px;
            }
            @media (max-width: 767px) {
                .dropdown-menu.multi-column {
                    min-width: 240px !important;
                    overflow-x: hidden;
                }
            }

            @media (max-width: 480px) {
                .content {
                    width: 90%;
                    margin: 50px auto;
                    padding: 10px;
                }
            }
            @media (min-width: 768px) and (max-width:1023px) {
                .dropdown-menu.columns-2 {
                    margin-left: -100px;
                }

                .dropdown-menu.columns-3 {
                    margin-left: -300px;
                }
            }
    </style>
</head>
<body >
	<div id="menu">
  		<div class="row">
  			<div class="col-md-12">
  				<nav class="navbar navbar-default" role="navigation" >
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
	                                    <li><a href="{{URL::to('songnew')}}">Nhạc mới</a></li>
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
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
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
	@yield('content')
	<div class="panel panel-primary">
		<div class="panel-footer">
			<div class="container">
				<div class="caption">
					<p style="text-align: center;color: blue;">Copyright (@) AJAX TEAM</p>
				</div>
			</div>
		</div>
	</div>	
	 <script src="/js/app.js"></script>
</body>
</html>
