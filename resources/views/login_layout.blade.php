<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>HK SHOP</title>
		<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
		<link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
		<link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
		<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
		<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
		<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
		<link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<!--/head-->

	<body>
		<?php
			$customer_id = Session::get('customer_id');			
			$shipping_id = Session::get('shipping_id');
		?>
		<header id="header">
			<!--header-->
			<div class="header_top">
				<!--header_top-->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="contactinfo">
								<ul class="nav nav-pills">
									<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
									<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header_top-->

			<div class="header-middle">
				<!--header-middle-->
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="logo pull-left">
								<a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/images/logo.png')}}" alt="" /></a>
							</div>
							<div class="btn-group pull-right">
								{{-- <div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle usa"
										data-toggle="dropdown">
										USA
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Canada</a></li>
										<li><a href="#">UK</a></li>
									</ul>
								</div>

								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle usa"
										data-toggle="dropdown">
										DOLLAR
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Canadian Dollar</a></li>
										<li><a href="#">Pound</a></li>
									</ul>
								</div> --}}
							</div>
						</div>
						<div class="col-sm-8">
							<div class="shop-menu pull-right">
								<ul class="nav navbar-nav">
									{{-- <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i> Tài khoản</a></li> --}}
									<li><a href="#"><i class="fa fa-star"></i> Favourites</a></li>
									@if ($customer_id && $shipping_id == NULL)	
										<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									@elseif($customer_id && $shipping_id)
										<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									@else
										<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									@endif

									
									<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
									
									@if ($customer_id)
										<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Log out</a></li>
									@else
										<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Log in</a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header-middle-->

			<div class="header-bottom">
				<!--header-bottom-->
				<div class="container">
					<div class="row">
						<div class="col-sm-7">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse"
									data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>
									<li class="dropdown"><a href="#">Product<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="shop.html">Products</a></li>
											<li><a href="product-details.html">Product Details</a></li>
											<li><a href="checkout.html">Checkout</a></li>
											<li><a href="cart.html">Cart</a></li>
											<li><a href="login.html">Login</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="#">News<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="blog.html">Blog List</a></li>
										</ul>
									</li>
									<li><a href="{{URL::to('/show-cart')}}">Cart</a></li>
									<li><a href="contact-us.html">Contact</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-5">
							<form action="{{URL::to('/tim-kiem')}}" method="post">
								{{ csrf_field() }}
								<div class="search_box pull-right">
									<input type="text" name="keyword_submit" placeholder="Search product name" />
									<input type="submit" style="margin-top:0px; color:black" name="search_item" class="btn btn-primary btn-sm" value="Search" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--/header-bottom-->
		</header>
		<!--/header-->


		<section>
			<div class="container">
				<div class="col-sm-9 padding-right">

					@yield('content')

				</div>
			</div>
			</div>
		</section>

		<footer id="footer">
			<!--Footer-->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="companyinfo">
								<h2><span>hk</span>-shop</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="https://www.israel21c.org/wp-content/uploads/2019/11/shutterstock_713446456-768x432.jpg" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="{{asset('public/frontend/images/iframe2.png')}}" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="https://www.lifewire.com/thmb/T2EOmgwFKMF09roZpTQ-lycixck=/768x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-508154916-5c9243bdc9e77c00014a9e5d.jpg" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="{{asset('public/frontend/images/iframe4.png')}}" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="address">
								<img src="{{asset('public/frontend/images/map.png')}}" alt="" />
								<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer-widget">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Service</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Online Help</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Order Status</a></li>
									<li><a href="#">Change Location</a></li>
									<li><a href="#">FAQ’s</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Quock Shop</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">T-Shirt</a></li>
									<li><a href="#">Mens</a></li>
									<li><a href="#">Womens</a></li>
									<li><a href="#">Gift Cards</a></li>
									<li><a href="#">Shoes</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Policies</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Terms of Use</a></li>
									<li><a href="#">Privecy Policy</a></li>
									<li><a href="#">Refund Policy</a></li>
									<li><a href="#">Billing System</a></li>
									<li><a href="#">Ticket System</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>About Shopper</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Company Information</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Store Location</a></li>
									<li><a href="#">Affillate Program</a></li>
									<li><a href="#">Copyright</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-sm-offset-1">
							<div class="single-widget">
								<h2>About Shopper</h2>
								<form action="#" class="searchform">
									<input type="text" placeholder="Your email address" />
									<button type="submit" class="btn btn-default"><i
											class="fa fa-arrow-circle-o-right"></i></button>
									<p>Get the most recent updates from <br />our site and be updated your self...</p>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<p class="pull-left">Copyright © 2013 HK-SHOP Inc. All rights reserved.</p>
						<p class="pull-right">Designed by <span><a target="_blank"
									href="http://www.themeum.com">Themeum</a></span></p>
					</div>
				</div>
			</div>

		</footer>
		<!--/Footer-->



		<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
		<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
		<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
		<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
		<script src="{{asset('public/frontend/js/main.js')}}"></script>
	</body>

</html>