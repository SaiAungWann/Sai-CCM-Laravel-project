<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>CCM - Larval-01</title>



	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<!-- <link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css"/> -->
	<link rel="stylesheet" href="{{ asset('access/css/bootstrap.min.css')}}">

	<!-- Slick
		<link type="text/css" rel="stylesheet" href="../../css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/slick-theme.css"/> -->
	<link rel="stylesheet" href="{{asset ('access/css/slick.css')}}" />
	<link rel="stylesheet" href="{{asset ('access/css/slick-theme.css')}}" />

	<!-- nouislider -->
	{{-- <link type="text/css" rel="stylesheet" href="{{asset ('access/css/nouislider.min.css')}}" /> --}}

	<!-- Font Awesome Icon -->
	{{-- <link rel="stylesheet" href="{{asset ('access/css/font-awesome.min.css')}}"> --}}

	<!-- Custom stlylesheet -->
	<link rel="stylesheet" href="{{asset('access/css/admin-templatemo-style.css')}}">
	<link rel="stylesheet" href="{{ asset ('access/css/style.css') }}">
	{{-- <link rel="stylesheet" href="/style.css">  not working--}} 
	<script src="https://cdn.tailwindcss.com"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/66fe363d37379df10df1198b/1i98g7ofh';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<body class="body">

	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container ">
				<ul class=" header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
					<li><a href="/locale/mm"><i class="font-blod"></i> MM</a></li>
					<li><a href="/locale/en"><i class="font-blod"></i> EN</a></li>

					@auth
					<li><a href="/user/{{auth()->user()->id}}/profile"><i class="fa fa-user-o"></i> {{auth()->user()->full_name}}</a></li>
					<li>
						<form
							action="/logout"
							method="POST">
							@csrf
							<button
								type="submit"
								class="text-red-500 font-bold"><i class="fa fa-user-o"></i>logout</button>
						</form>
					</li>
			</div>

			@else
			<li><a href="/login"><i class="fa fa-user-o"></i> Login</a></li>
			<li><a href="/register"><i class="fa fa-user-o"></i> Register</a></li>
			@endauth
			</ul>
		</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header" class="main-header">
			<!-- container -->
			<div class="container main-header">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo flex items-center">
							<a href="/" class="logo">
								{{-- <img src="{{ asset('./access/img/logo.png')}}" alt=""> --}}
								<p class="font-bold text-white text-3xl text-center mt-4">SAI <span class="text-red-500">LARAVEL</span></p>
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form action="/store/search">
								<select class="input-select" name="category">
									<option value="">All Categories</option>
									@php
										$categories = \App\Models\Category::all();
									@endphp

									@foreach ($categories as $category)

									<option 
									value="{{ $category->id }}"
									
									{{request('category') === $category->id ? 'selected' : ''}}
										>{{$category->name}}</option>

               						 @endforeach
								</select>
								<form >
									<input class="input" placeholder="Search here" name="search" value="{{request('search')}}">
									<button class="search-btn" type="submit">Search</button>
								</form>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							@auth
							<div>
								<a href="/wishlist">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>

									@if (auth()->user()->wish_list?->wish_list_items->count())

									<div class="qty">{{auth()->user()->wish_list?->wish_list_items->count()}}</div>
								
									@endif
								</a>
							</div>								
							@endauth
							<!-- /Wishlist -->

							<!-- Cart -->
							@auth
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									@if (auth()->user()->cart?->cart_items->count())

									<div class="qty">{{auth()->user()->cart?->cart_items->count()}}</div>

									@endif
								</a>
							
								<div class="cart-dropdown">
									<div class="cart-list">
										@php
											$cart_items = auth()->user()->cart?->cart_items->load('product');
											@endphp
										@if ($cart_items?->count())
										
										@foreach ($cart_items as $cart_item)

										<li>
											<div class="product-widget">
												<div class="product-img">
													<img src="{{ asset($cart_item->product->load('product_images')->product_images->first()->product_image)}}" alt="">
												</div>
												
												<div class="product-body">
													<h3 class="product-name"><a href="/product-details/{{ $cart_item->product->id }}">{{$cart_item->product->name}}</a></h3>
													<h4>hello</h4>
													<h4 class="product-price"><span class="qty"></span>{{$cart_item->quantity}} x $ {{$cart_item->total_price}} =
														<strong>$ {{$cart_item->quantity * $cart_item->total_price}}</strong>
													</h4>
													
												</div>
										<form action="/cart_items/{{$cart_item->id}}/delete" method="POST" class="delete">                
											@csrf
											<button class="delete"><i class="fa fa-close"></i></button>

											</form>			
												
											</div>
										</li>
										<hr>
										@endforeach
										@else
										<p class="text-center">Your cart is empty</p>
										
										@endif

									</div>
									<div class="cart-summary">
										@if ($cart_items?->count())
										<small>{{$cart_items->count()}} Item(s) selected</small>
										<h5 class="text-black">SUBTOTAL: ${{$cart_items->sum('total_price')}}</h5>
										@else
										<h5>SUBTOTAL: $0</h5>
										@endif
									</div>
									<div class="cart-btns">
										<a href="/cart">View Cart</a>
										
									</div>
								</div>
							</div>

							@endauth

							<!-- /Cart -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	@php
	use App\Models\ProductBrand;
	$productBrands = ProductBrand::all();
	@endphp
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li><a href="/" class="{{ request()->routeIs('home') ? 'activeNow' : '' }}">Home</a></li>
                <li><a href="/categoryCollections" class="{{ request()->routeIs('categoryCollections') ? 'activeNow' : '' }}">Categories</a></li>
                <li><a href="/about-us" class="{{ request()->routeIs('about-us') ? 'activeNow' : '' }}">About Us</a></li>
				<li><a href="/contact-us" class="{{ request()->routeIs('contact-us') ? 'activeNow' : '' }}">Contact Us</a></li>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

		{{-- alart box --}}
		@if(session('success'))
		<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  			<div class="flex">
    			<div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    			<div>
      			<p class="font-bold">Your Order Has Been Placed</p>
      			<p class="text-sm">Please Check Your Email For Details</p>
    			</div>
  			</div>
		</div>
		@endif
		{{-- alart box --}}
		
		

		<!-- /NAVIGATION -->

		{{ $slot }}

		<!-- NEWSLETTER -->
		 <hr>	
		 <div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Need Help? <strong>CONTACT US</strong></p>
							<form action="/contact-us">
								<input class="input" name="email" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Sent Email</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
		
									@php
										$categories = \App\Models\Category::all();
									@endphp

									@foreach ($categories as $category)

									<li> <a href="/categories/{{$category->name}}/show">{{$category->name}}</a></li>
               						 @endforeach
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="/about-us">About Us</a></li>
									<li><a href="/contact-us">Contact Us</a></li>
									<li><a href="/privacy-and-policy">Privacy Policy</a></li>
									<li><a href="/orders-and-return">Orders and Returns</a></li>
									<li><a href="/terms-and-conditions">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li>
										{{-- {{ auth()->check() ? auth()->user()->email : request()->email }} --}}
										<a href="{{ auth()->check() ? '/user/' . auth()->user()->full_name . '/profile' : '/login' }}">My Account</a></li>

									<li><a href="/cart">View Cart</a></li>
									<li><a href="/wishlist">Wishlist</a></li>
									<li>

										<a href="{{ auth()->check() ? '/user/' . auth()->user()->full_name . '/profile' : '/login' }}">Track My Order</a></li>
									<li><a href="/contact-us">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
			
		<script src="{{asset('./access/js/jquery.min.js')}}"></script>
		<script src="{{asset('./access/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('./access/js/slick.min.js')}}"></script>
		<script src="{{asset('./access/js/nouislider.min.js')}}"></script>
		<script src="{{asset('./access/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('./access/js/main.js')}}"></script>
		<script src="{{asset('./access/js/cart.js')}}"></script>
		<script src="{{asset('./access/js/checkout.js')}}"></script>
		<script src="https://kit.fontawesome.com/a74a4045c4.js" crossorigin="anonymous"></script>
<script>
	 document.querySelectorAll('#search-form-category input').forEach(input => {
        input.addEventListener('change', function() {
            // Submit the form automatically when an input changes
            document.getElementById('search-form-category').submit();
        });
    });
	 document.querySelectorAll('#search-form-brand input').forEach(input => {
        input.addEventListener('change', function() {
            // Submit the form automatically when an input changes
            document.getElementById('search-form-brand').submit();
        });
    });
</script>
</body>

</html>