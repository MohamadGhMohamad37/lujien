<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="format-detection" content="telephone=no">
	<meta name="it-rating" content="it-rat-cd303c3f80473535b3c667d0d67a7a11">
	<meta name="cmsmagazine" content="3f86e43372e678604d35804a67860df7">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
	<title>@yield('title')</title>
	<meta name='description' content="" />
	<meta name="keywords" content="" />
	<link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}" />
	<link rel="preload stylesheet" href="{{asset('assets/css/style.css')}}" as="style">
	<link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css') }}" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="loaded">


	<!-- BEGIN BODY -->

	<div class="main-wrapper">

	
        @yield('content')
		<!-- BEGIN HEADER -->

		<header class="header">
			{{-- <div class="header-top">
				<span>30% OFF ON ALL PRODUCTS ENTER CODE: beshop2020</span>
				<i class="header-top-close js-header-top-close icon-close"></i>
			</div> --}}
			<div class="header-content">
				<div class="header-logo">
					<img src="{{asset('assets/img/header-logo.png')}}" width="50%" alt="">
				</div>
				<div class="header-box">
					<ul class="header-nav">
						<li><a href="{{ route('home.page', ['lang' => app()->getLocale()]) }}">Home</a></li>
						<li><a href="">pages</a>
							<ul>
								<li><a href="{{ route('about.page', ['lang' => app()->getLocale()]) }}">About us</a></li>
							</ul>
						</li>
						<li><a href="{{ route('shop.page', ['lang' => app()->getLocale()]) }}">shop</a></li>
						<li><a href="{{ route('contact.page', ['lang' => app()->getLocale()]) }}">contact</a></li>
					</ul>
					<ul class="header-options">
						@auth
						<li><a href="{{ route('contact.page', ['lang' => app()->getLocale()]) }}"><i class="fa-solid fa-truck"></i></a></li>
						<li><a href="{{ route('cart.page', ['lang' => app()->getLocale()]) }}"><i class="icon-cart"></i></a></li>
						<li>
							<form action="{{ route('logout') }}" method="POST" style="display: inline;">
								@csrf
								<button type="submit" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">
									logout
								</button>
							</form>
						</li>
						@else
						<a href="" class="btn_login">login</a> | <a href="" class="btn_join">Registertion</a>
						@endauth
						
						
					</ul>
				</div>

				<div class="btn-menu js-btn-menu"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>
			</div>
		</header>

		<!-- HEADER EOF   -->

		<!-- BEGIN FOOTER -->

		<footer class="footer">
			<div class="wrapper">
				<div class="footer-top">
					<div class="footer-top__social">
						<span>Find us here:</span>
						<ul>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-insta"></i></a></li>
							<li><a href="#"><i class="icon-in"></i></a></li>
						</ul>
					</div>
					<div class="footer-top__logo">
						<img data-src="{{asset('assets/img/footer-logo.png')}}" width="50%" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
							class="js-img" alt="">
					</div>
					<div class="footer-top__payments">
						<span>Payment methods:</span>
						<ul>
							<li><img data-src="img/payment1.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
									class="js-img" alt=""></li>
							<li><img data-src="img/payment2.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
									class="js-img" alt=""></li>
							<li><img data-src="img/payment3.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
									class="js-img" alt=""></li>
							<li><img data-src="img/payment4.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
									class="js-img" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="footer-nav">
					<div class="footer-nav__col">
						<span class="footer-nav__col-title">About</span>
						<ul>
							<li><a href="about.html">About us</a></li>
							<li><a href="categories.html">Categories</a></li>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</div>
					<div class="footer-nav__col">
						<span class="footer-nav__col-title">Categories</span>
						<ul>
							<li><a href="#">Make up</a></li>
							<li><a href="#">SPA</a></li>
							<li><a href="#">Perfume</a></li>
							<li><a href="#">Nails</a></li>
							<li><a href="#">Skin care</a></li>
							<li><a href="#">Hair care</a></li>
						</ul>
					</div>
					<div class="footer-nav__col">
						<span class="footer-nav__col-title">Useful links</span>
						<ul>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Privacy policy</a></li>
							<li><a href="#">Terms of use</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Shipping details</a></li>
							<li><a href="#">Information</a></li>
						</ul>
					</div>
					<div class="footer-nav__col">
						<span class="footer-nav__col-title">Contact</span>
						<ul>
							<li><i class="icon-map-pin"></i> 27 Division St, New York, NY 10002, USA</li>
							<li>
								<i class="icon-smartphone"></i>
								<div class="footer-nav__col-phones">
									<a href="tel:+13459971345">+1 345 99 71 345</a>
									<a href="tel:+13457464975">+1 345 74 64 975</a>
								</div>
							</li>
							<li><i class="icon-mail"></i><a href="mailto:info@beshop.com">info@beshop.com</a></li>
						</ul>
					</div>
				</div>
				<div class="footer-copy">
					<span>&copy; All rights reserved. BeShop 2020</span>
				</div>
			</div>
		</footer>

		<!-- FOOTER EOF   -->



	</div>

	<div class="icon-load"></div>

	<!-- BODY EOF   -->

	<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('assets/js/lazyload.min.js')}}"></script>
	<script src="{{asset('assets/js/slick.min.js')}}"></script>
	@yield('script')
	<script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>