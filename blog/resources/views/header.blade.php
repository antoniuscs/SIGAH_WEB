<!DOCTYPE HTML>
<html>
	<head>
	<link rel="icon" 
      type="image/png" 
      href="images/hotel.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIGAH &mdash; Sistem Informasi Grand Atma Hotels</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
	<!-- Fonts-->
	<link rel="stylesheet" href="{{ URL::asset('css/icomoon.css') }}">

	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{ URL::asset('css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ URL::asset('js/modernizr-2.6.2.min.js') }}"></script>
		<script src="{{ asset('js/jquery.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">


	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="{{ url('/index') }}">SIGAH <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						@if(\Auth::guest())
						<li class="btn-cta">
							<a href="{{ url('/reservasi-user') }}"><span>Reservasi</span></a>
						</li>

						@endif
						<li>
							@if(\Auth::check() && \Auth::user()->role == "1")
								<a href="{{ route('dashboard.create') }}">Admin</a>
							@elseif(\Auth::check() && \Auth::user()->role == "12")

							@endif
						</li>
						<li>
							<a href="{{ url('/index') }}">Beranda</a>
						</li>
						<li>
							<a href="{{ url('/kamarutama') }}">Kamar</a>
						</li>
						<li>
							<a href="{{ url('/fasilitasutama') }}">Fasilitas</a>
						</li>
						@if(\Auth::check() && \Auth::user()->role == "1")

						@endif
						@if(\Auth::check() && \Auth::user()->role == "12")
						<li class="btn-cta">

							<a href="{{ route('logout') }}">
								<span>Log Out</span>
							</a>
						</li>
						@endif
					</ul>
				</div>
			</div>

		</div>
	</nav>
