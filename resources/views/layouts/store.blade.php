<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>July Flash Sale - Crypto2Naira</title>
	
	<!-- Custom - Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('commerce/style.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
	
	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<!-- Loader -->
	{{-- <div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div> --}}<!-- Loader /- -->
	
	
	<!-- Header -->
	<header class="header-main container-fluid no-padding">
		<!-- SidePanel -->
		<div id="slidepanel">
			<!-- Top Header -->
			<div class="top-header container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<ul class="contact">
						<li><a href="tel:+2348183434521" title="+2348183434521"><i class="fa fa-phone" aria-hidden="true"></i><span>Phone :</span> +2348183434521</a></li>
						<li><a href="mailto:flashsales@crypto2naira.com" title="flashsales@crypto2naira.Com"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Email :</span> flashsales@crypto2naira.Com</a></li>
					</ul>
					<div class="dropdown-bar">
						<div class="language-dropdown dropdown">
							<label>Currency :</label>
							<button class="btn dropdown-toggle" type="button" id="currency" title="currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">TBC<span class="caret"></span></button>
							<ul class="dropdown-menu no-padding">
								<li><a title="TBC">TBC</a></li>
								<li><a title="GRC">GRC</a></li>
								<li><a title="BTC">BTC</a></li>
							</ul>
						</div>
						<div class="language-dropdown dropdown">
							<button class="btn dropdown-toggle" type="button" id="Username" title="Username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Account<span class="caret"></span></button>
							<ul class="dropdown-menu no-padding">
								@if(Auth::check())
									<li><a href="{{ route('home') }}">Dashboard</a></li>

									<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()">Logout</a></li>
									<form method="post" action="{{ route('logout') }}" id="logout">
										{{ csrf_field() }}
									</form>
								@else
								<li><a href="/login" title="Login">Login</a></li>
								<li><a href="/register" title="register">Register</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div><!-- Container /- -->
			</div><!-- Top Header /- -->
			
			<!-- Middel Header -->
			<div class="middle-header container-fluid no-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-5 col-sm-4 col-xs-4">
							<div class="logo-block">
								<a href="/store">Flash<span>Sale</span></a>
							</div>
						</div>
						<div class="header-info">
							<form method="get">
							<div class="col-md-5 col-sm-6 col-xs-6">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search<span class=""></span></button>
										
									</div><!-- /btn-group -->
									<input type="text" placeholder="..." class="form-control" name="query">
									<span class="input-group-btn">
										<button type="submit" title="Search" class="btn btn-search"><i class="fa fa-search"></i></button>
									</span>
								</div><!-- /input-group -->
							</div>
							</form>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2 add-to-cart">
							<ul class="cart">
								<li>
									<a aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" id="cart" class="btn dropdown-toggle" title="Add To Cart">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</div>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- Middel Header /- -->	
		</div>		
		
		<!-- Menu Block -->
		<div class="menu-block menu-block-section container-fluid no-padding">
			<!-- Container -->
			<div class="container">				
				<nav class="navbar ow-navigation">
					<div id="loginpanel" class="desktop-hide">
						<div class="right" id="toggle">
							<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
							<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
						</div>
					</div>
					<div class="navbar-header">
						<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="text-logo desktop-hide" href="index.html"><span>Flash</span>Sale</a>
					</div>
					<div class="navbar-collapse collapse navbar-right" id="navbar">
						<ul class="nav navbar-nav menubar">
							<li class="dropdown">
								<a title="Home" href="/store">Home</a>
							</li>
							<li class="dropdown">
								<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Categories">Categories</a>
								<i class="ddl-switch fa fa-angle-down"></i>
								<ul class="dropdown-menu" style="width: auto;">
									@foreach($categories as $c)
										<li><a title="Shop 1" href="{{ route('category', $c->id) }}">{{$c->name}}</a></li>
									@endforeach
								</ul>
							</li>
							@if(Auth::check())
							<li><a title="Dashboard" href="{{route('home')}}">Dashboard</a></li>
							@else
							<li><a href="{{ route('login') }}">Login</a></li>
							@endif
						</ul>
					</div>
				</nav><!-- Navigation /- -->
			</div><!-- Container /- -->
		</div><!-- Menu Block /- -->
	</header><!-- Header /- -->
	
	
	@yield('content')
	
	<!-- Footer Main -->
	<footer class="footer-main container-fluid no-padding">
		<div class="container">
			<div class="row">
				<div class="footer-header">
					<a href="index.html" title="Furn Home">Flash<span>Sale</span></a>
				</div>
				<div class="footer-social">
					<ul>
						<li><a href="#" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- Footer Main /- -->
	
	<!-- Bottom Footer -->
	<div class="bottom-footer container-fluid no-padding">
		<div class="container">
			<div class="footer-content">
				<div class="footer-copyright">
					<p>&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
				</div>
			</div>
		</div>
	</div><!-- Bottom Footer /- -->
	
	
	
	<!-- JQuery v1.11.3 -->
	<script src="{{ URL::to('commerce/js/jquery.min.js') }}"></script>

	<!-- Library - Js -->
	<script src="{{ URL::to('commerce/libraries/lib.js') }}"></script>
	<!-- Bootstrap JS File v3.3.5 -->
	
	<script src="{{ URL::to('commerce/libraries/jquery.countdown.min.js') }}"></script>
	
	<script src="{{ URL::to('commerce/libraries/lightslider-master/lightslider.js') }}"></script>
	
	<script src="{{ URL::to('commerce/libraries/slick/slick.min.js') }}"></script>

	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	

	<script type="text/javascript">
		@if(session()->has('success'))
            swal({
                type: 'success',
                title: "{!! session('success') !!}"
            })
        @endif
        @if(session()->has('error'))
            swal({
                type: 'error',
                title: "{!! session('error') !!}"
            })
        @endif
	</script>
	
	<!-- Library - Theme JS -->
	<script src="{{ URL::to('commerce/js/functions.js') }}"></script>
	<script src="{{ URL::to('js/app.js') }}"></script>

	@yield('scripts')

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-102209671-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>