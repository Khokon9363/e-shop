<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="{{ asset('shop/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('shop/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('shop/css/team.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('shop/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('shop/css/flexslider.css') }}" type="text/css" media="screen" />
	<link href="{{ asset('shop/css/font-awesome.css') }}" rel="stylesheet"> 
	<link href="{{ asset('shop/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css'/>
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header" id="home">
	<div class="container">
		<ul>
		@auth
		    <li>Welcome {{ auth()->user()->name }} </a></li>
		@endauth
		@guest
		    <li> <a href="{{ url('/login') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
			<li> <a href="{{ url('/register') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
		@endguest
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:edward@eshop.com">edward@eshop.com</a></li>
		@auth
		    <li> <a href="{{ url('/user/dashboard') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Dashboard </a></li>
		@endauth
		</ul>
	</div>
</div>
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form action="#" method="post">
					<input type="search" name="search" placeholder="Search here..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
			<div class="col-md-4 logo_agile">
				<h1><a href="{{ url('/') }}"><span>E</span> - Shop <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
		<div class="col-md-4 agileits-social top_content">
			<ul class="social-nav model-3d-0 footer-social w3_agile_social">
				<li class="share">Share On : </li>
				<li><a href="#" class="facebook">
					<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
					<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="twitter"> 
					<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
					<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="instagram">
					<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
					<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="pinterest">
					<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
					<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="ban-top">
	<div class="container-fluid">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
					@foreach($categories as $category)
					<li class="menu__item dropdown">
					    <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ $category->name }} <b class="caret"></b></a>
						@if(count($category->product))
					    <ul class="dropdown-menu agile_short_dropdown">
							<li><a href="{{ url('/products/'.$category->id) }}">All of {{ $category->name }}</a></li>
					    @foreach($category->product as $product)
							<li><a href="{{ url('/product/'.$product->id) }}">{{ $product->name }}</a></li>
						@endforeach
					    </ul>
						@endif
					</li>
					@endforeach
					<li class=" menu__item"><a class="menu__link" href="{{ url('/contact') }}">Contact</a></li>
					<li class=" menu__item"><a class="menu__link" href="{{ url('/about') }}">About</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
				<form action="#" method="post" class="last"> 
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

@yield('content')

<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.html"><span>E</span>lite Shoppy </a></h2>
			<p>Lorem ipsum quia dolor
			sit amet, consectetur, adipisci velit, sed quia non 
			numquam eius modi tempora.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
				<li><a href="#" class="facebook">
						<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="twitter"> 
						<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="instagram">
						<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="pinterest">
						<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
			</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Our <span>Information</span> </h4>
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/about') }}">About</a></li>
						<li><a href="{{ url('/contact') }}">Contact</a></li>
						<li><a href="{{ url('/login') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
         			    <li><a href="{{ url('/register') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
					</ul>
				</div>
				<div class="col-md-5 sign-gd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+1 234 567 8901</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>Broome St, NY 10002,California, USA. 
								
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 sign-gd flickr-post">
					<h4>Flickr <span>Posts</span></h4>
					<ul>
						<li><a href="single.html"><img src="{{ asset('shop/images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="{{ asset('shop/images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="agile_newsletter_footer">
					<div class="col-sm-6 newsleft">
				<h3>SIGN UP FOR NEWSLETTER !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form action="#" method="post">
					<input type="email" style="color: white;" placeholder="Enter your email..." name="email" required="">
					<input type="submit" value="Submit">
				</form>
			</div>

		<div class="clearfix"></div>
	</div>
		<p class="copy-right">&copy 2020 - {{ date('Y') }} {{ config('app.name') }}. All rights reserved | Developed by <a href="https://facebook.com/">Edward Anthony Jenner</a></p>
	</div>
</div>

<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script type="text/javascript" src="{{ asset('shop/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('shop/js/responsiveslides.min.js') }}"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
<script src="{{ asset('shop/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('shop/js/minicart.min.js') }}"></script>
<script>
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<script src="{{ asset('shop/js/easy-responsive-tabs.js') }}"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
	<script src="{{ asset('shop/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('shop/js/jquery.countup.js') }}"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- single -->
<script src="{{ asset('shop/js/imagezoom.js') }}"></script>
<!-- FlexSlider -->
<script src="{{ asset('shop/js/jquery.flexslider.js') }}"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<script type="text/javascript" src="{{ asset('shop/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('shop/js/jquery.easing.min.js') }}"></script>
<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
						<script type="text/javascript" src="{{ asset('shop/js/jquery-ui.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<script type="text/javascript" src="{{ asset('shop/js/bootstrap.js') }}"></script>
</body>
</html>