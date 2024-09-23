<x-layout>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
					<div id="aside" class="col-md-3">
					<!-- /aside Widget -->

					<!-- aside Widget Top Selling-->
					<div class="aside">
						<h3 class="aside-title">Top selling</h3>
						@php
							$topSellingProducts = $products->where('top_seller', 1); 
						@endphp
						@foreach ($topSellingProducts as $product)
						<div class="product-widget">
							<div class="product-img">
								<img src="{{asset($product->image)}}" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">{{$product->category->name}}</p>
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
					</div>
					<!-- /aside Widget -->
				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
				<!-- store products -->
                <div class="w-full flex flex-row align-baseline justify-between flex-wrap">
                        <!-- product -->
                        @foreach ($products as $product)
                        <div class="product w-full md:w-1/2 lg:w-1/3 p-5 flex flex-col justify-center">
                            <a href="/product-details/{{ $product->id }}">
								<div class="product-label">
									@if ($product->discounted_percentage > 0)
									<span class="sale">{{$product->discounted_percentage}} %</span>
									@endif
									@php
									$new_arrival=$product->new_arrival;
									@endphp
									@if($new_arrival == 1)
									<span class="new"> New </span>
									@endif
								</div>
                                <div class="product-img w-52 m-auto">
									<img class="img-fluid" src="{{ asset('./access/img/product01.png')}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{ $product->category->name }}</p>
                                    <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>

                                    @php
                                    $discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;
                                    @endphp

                                    <h4 class="product-price">{{$discounted_price}}
                                        @if ($product->discounted_percentage > 0)
                                        <del class="product-old-price">{{$product->price}}</del>
                                        @endif
                                    </h4>
                                    <x-productIcon :product="$product"></x-productIcon>
                                </div>
								
                            </a>
                        </div>

                        @endforeach
                        <!-- product -->
                </div>
				{{-- {{$products->links()}} --}}

					</div>
					<!-- /store products -->

				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
</x-layout>