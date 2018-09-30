<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon-->
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet" />
	@yield('css')
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
</head>
<body class="theme-red">
	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Carregando...</p>
		</div>
	</div>
	<!-- #END# Page Loader -->
	<!-- Overlay For Sidebars -->
	<div class="overlay"></div>
	<!-- #END# Overlay For Sidebars -->
	<!-- Search Bar -->
	<div class="search-bar">
		<div class="search-icon">
			<i class="material-icons">search</i>
		</div>
		<input type="text" placeholder="Buscar...">
		<div class="close-search">
			<i class="material-icons">close</i>
		</div>
	</div>
	<!-- #END# Search Bar -->
	<!-- Top Bar -->
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
				<a href="javascript:void(0);" class="bars"></a>
				<a class="navbar-brand" href="/home">{{ config('app.name', 'Laravel') }}</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<!-- Call Search -->
					<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
					<!-- #END# Call Search -->
					<!-- Notifications -->
					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
							<i class="material-icons">notifications</i>
							<span class="label-count">7</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">NOTIFICATIONS</li>
							<li class="body">
								<ul class="menu">
									<li>
										<a href="javascript:void(0);">
											<div class="icon-circle bg-light-green">
												<i class="material-icons">person_add</i>
											</div>
											<div class="menu-info">
												<h4>12 new members joined</h4>
												<p>
													<i class="material-icons">access_time</i> 14 mins ago
												</p>
											</div>
										</a>
									</li>
								</ul>
							</li>
							<li class="footer">
								<a href="javascript:void(0);">Ver todas as notificações</a>
							</li>
						</ul>
					</li>
					<!-- #END# Notifications -->
					<!-- Tasks -->
					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
							<i class="material-icons">message</i>
							<span class="label-count">9</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">MENSAGENS</li>
							<li class="body">
								<ul class="menu tasks">
									<li>
										<a href="javascript:void(0);">
											<h4>
												Footer display issue
												<small>32%</small>
											</h4>
											<div class="progress">
												<div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
												</div>
											</div>
										</a>
									</li>
								</ul>
							</li>
							<li class="footer">
								<a href="javascript:void(0);">Ver todas as mensagens</a>
							</li>
						</ul>
					</li>
					<!-- #END# Tasks -->
				</ul>
			</div>
		</div>
	</nav>
	<!-- #Top Bar -->
	<section>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar">
			<!-- User Info -->
			<div class="user-info">
				<div class="image">
					<img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
				</div>
				<div class="info-container">
					<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name.' '.Auth::user()->lname }}</div>
					<div class="email">{{ Auth::user()->email }}</div>
					<div class="btn-group user-helper-dropdown">
						<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
						<ul class="dropdown-menu pull-right">
							<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="javascript:void(0)"><i class="material-icons">group</i>Followers</a></li>
							<li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
							<li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sair</a></li>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</ul>
					</div>
				</div>
			</div>
			<!-- #User Info -->
			<!-- Menu -->
			<div class="menu">
				<ul class="list">
					<li class="header">MENU</li>
					<li class="@if(Request::url() == route('home')) active @endif">
						<a href="{{ route('home') }}">
							<i class="material-icons">dashboard</i>
							<span>Principal</span>
						</a>
					</li>
					<li class="@if(Request::url() == route('posts.index') or Request::url() == route('posts.create')) active @endif">
					  <a href="#" class="menu-toggle toggled waves-effect waves-block">
						  <i class="material-icons">notes</i>
						  <span>Meus Posts</span>
					  </a>
					  <ul class="ml-menu" style="display: block;">
						  <li class="@if(Request::url() == route('posts.create')) active @endif">
							  <a href="{{ route('posts.create') }}" class="@if(Request::url() == route('posts.create')) toggled @endif waves-effect waves-block">Novo post</a>
						  </li>
							<li class="@if(Request::url() == route('posts.index')) active @endif">
							  <a href="{{ route('posts.index') }}" class="@if(Request::url() == route('posts.index')) toggled @endif waves-effect waves-block">Todos os meus post</a>
						  </li>
					  </ul>
					</li>
					<li class="@if(Request::url() == route('follow')) active @endif">
						<a href="{{ route('follow') }}">
							<i class="material-icons">group_add</i>
							<span>Seguindo</span>
						</a>
					</li>
					<li class="@if(Request::url() == route('followers')) active @endif">
						<a href="{{ route('followers') }}">
							<i class="material-icons">group</i>
							<span>Seguidores</span>
						</a>
					</li>
				</ul>
			</div>
			<!-- #Menu -->
			<!-- Footer -->
			<div class="legal">
				<div class="copyright">
					&copy; 2018 <a href="#">AlexRodri</a>.
				</div>
				<div class="version">
					<b>Version: </b> 1.0.0
				</div>
			</div>
			<!-- #Footer -->
		</aside>
		<!-- #END# Left Sidebar -->
	</section>

	<section class="content">
		<div class="container-fluid">
			@yield('content')
		</div>
	</section>

	<!-- Jquery Core Js -->
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

	<!-- Bootstrap Core Js -->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

	<!-- Slimscroll Plugin Js -->
	<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

	<!-- Waves Effect Plugin Js -->
	<script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

	<!-- Sparkline Chart Plugin Js -->
	<script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

	@yield('jsimport')

	<!-- Custom Js -->
	<script src="{{ asset('js/admin.js') }}"></script>
	@yield('js')

	<!-- Demo Js -->
	<script src="{{ asset('js/demo.js') }}"></script>
</body>
</html>
