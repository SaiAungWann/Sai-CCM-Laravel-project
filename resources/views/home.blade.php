<x-layout>


	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<!-- hello  -->
						<div class="my-5 mx-auto font-bold text-black">
							<h1 class="text-center text-black">{{__('message.welcome')}}</h1>
						</div>
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3>02</h3>
									<span>Days</span>
								</div>
							</li>
							<li>
								<div>
									<h3>10</h3>
									<span>Hours</span>
								</div>
							</li>
							<li>
								<div>
									<h3>34</h3>
									<span>Mins</span>
								</div>
							</li>
							<li>
								<div>
									<h3>60</h3>
									<span>Secs</span>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase text-black">hot deal this week</h2>
						<p>New Collection Up to 50% OFF</p>
						<a class="primary-btn cta-btn" href="/store">Shop now</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->

	<!-- category section -->
	<div class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<h1 class="title">Category Collections</h1>
				 @foreach ($categories as $category)
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="{{asset($category->image)}}" alt="">
						</div>

						<div class="shop-body">
							<h3>{{$category->name}}<br> Collection </h3>
							<a href="/categories/{{$category->name}}/show" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				@endforeach 
			</div>
		</div>
		<!-- /row -->
	</div>


	<!-- PORDUCT SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<a href="/store">
							<h1 class="title">Our Products</h1>
						</a>

						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								@foreach ($categories as $category)

								<li><a href="/category/{{ $category->id }}">{{$category->name}}</a></li>

								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<x-allProducts :products="$products"></x-allProducts>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


	<!--New Product SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Arriving Products</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								@foreach ($categories as $category)

								<li><a href="/category/{{ $category->id }}">{{$category->name}}</a></li>

								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<x-newArrivingProduct :newArrivalProducts="$newArrivalProducts"></x-newArrivingProduct>
			</div>
		</div>
		<!-- /Products tab & slick -->
	</div>
	<!-- / Nwe product SECTION -->

	<!--TOP SELLING COLLECTION SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div>
							<!-- product widget -->
							@foreach ($topSellingProductsOne->load('product_images') as $product)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{asset($product->product_images->first()->product_image)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $category->find(1)->name }}</p>
									<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>

									@php
										$discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;

										@endphp
									<h4 class="product-price">{{$discounted_price}}
											@if ($product->discounted_percentage > 0)
											<del class="product-old-price">{{$product->price}}</del>
											@endif
										</h4>
								</div>
							</div>
							@endforeach
							<!-- /product widget -->

						</div>
						<div>
							<!-- product widget -->
							@foreach ($topSellingProductsOne as $product)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{asset($product->product_images->first()->product_image)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $category->find(2)->name }}</p>
									<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>

									@php
										$discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;

										@endphp
									<h4 class="product-price">{{$discounted_price}}
											@if ($product->discounted_percentage > 0)
											<del class="product-old-price">{{$product->price}}</del>
											@endif
										</h4>
								</div>
							</div>
							@endforeach
							<!-- /product widget -->

						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-4" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-4">
						<div>
							<!-- product widget -->
							@foreach ($topSellingProductsOne as $product)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{asset($product->product_images->first()->product_image)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $category->find(3)->name }}</p>
									<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>

									@php
										$discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;

										@endphp
									<h4 class="product-price">{{$discounted_price}}
											@if ($product->discounted_percentage > 0)
											<del class="product-old-price">{{$product->price}}</del>
											@endif
										</h4>
								</div>
							</div>
							@endforeach
							<!-- /product widget -->

						</div>
						<div>
							<!-- product widget -->
							@foreach ($topSellingProductsTwo as $product)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{asset($product->product_images->first()->product_image)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $category->find(2)->name }}</p>
									<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>

									@php
										$discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;

										@endphp
									<h4 class="product-price">{{$discounted_price}}
											@if ($product->discounted_percentage > 0)
											<del class="product-old-price">{{$product->price}}</del>
											@endif
										</h4>
								</div>
							</div>
							@endforeach
							<!-- /product widget -->

						</div>
					</div>
				</div>


				<div class="clearfix visible-sm visible-xs"></div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-5" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-5">
						<div>
							<!-- product widget -->
							@foreach ($topSellingProductsThree as $product)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{asset($product->product_images->first()->product_image)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $category->find(3)->name }}</p>
									<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>

									@php
										$discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;

										@endphp
									<h4 class="product-price">{{$discounted_price}}
											@if ($product->discounted_percentage > 0)
											<del class="product-old-price">{{$product->price}}</del>
											@endif
										</h4>
								</div>
							</div>
							@endforeach
							<!-- /product widget -->
						</div>

						<div>
							<!-- product widget -->
							@foreach ($topSellingProductsOne as $product)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{asset($product->product_images->first()->product_image)}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{ $category->find(1)->name }}</p>
									<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>

									@php
										$discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;

										@endphp
									<h4 class="product-price">{{$discounted_price}}
											@if ($product->discounted_percentage > 0)
											<del class="product-old-price">{{$product->price}}</del>
											@endif
										</h4>
								</div>
							</div>
							@endforeach
							<!-- /product widget -->
						</div>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



	<!-- FOOTER -->
</x-layout>