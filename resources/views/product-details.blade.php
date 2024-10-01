<x-layout>

	{{-- BREADCRUMB  --}}
	<div id="breadcrumb" class="section"> 
	{{-- container --> --}}
	<div class="container"> 
	{{-- row  --}}
	<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Headphones</a></li>
							<li class="active">Product name goes here</li>
						</ul>
					</div>
				</div> 
	{{-- /row  --}}
	</div> 
 {{-- /container  --}}
	 </div> 
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container ">
			<!-- row -->
			<div class="row ">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2 ">
					<br>
					<br>
					<br>
					<div id="product-main-img">
						@foreach ($product->product_images as $image)
						
							
						<div class="product-preview">
							<img src="{{asset($image->product_image)}}" alt="">
						</div>
						@endforeach
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<br><br><br>
					<div id="product-imgs">
												
						{{-- {{dd($product->product_images)}} --}} 
						 @foreach ($product->product_images as $image)
						<div class="product-preview">
							<img src="{{asset($image->product_image)}}" alt="">
						</div>
						@endforeach
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name">{{$product->name}}</h2>
						<p class="product-category text-white">{{$product->category->name}}</> 
						<p class="product-brand text-white" >{{$product->product_brand->name}}</p>

						<div>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<a class="review-link text-white" href="#">10 Review(s) | Add your review</a>
						</div>
						<div>
							@php
							$discounted_price = $product->price - $product->discounted_percentage / 100 * $product->price;
							@endphp
							<h3 class="product-price">{{$discounted_price}} <del class="product-old-price">{{$product->price}}</del></h3>
							<span class="product-available"> In Stock </span>
							<!-- <span class="product-available"> 10 In Stock</span> -->

							<p class="product-description text-white text-justify">{{$product->description}}</p> <br>

							<table class=" table table-hover tm-product-table tm-table-small ">
								<tr class="font-bold">
									<td class=" "><span>PROCESSOR</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->processor}}</td>
									<td><span class="text-white">SCREEN-SIZE</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->screen_size}}</td>
								</tr>
						
								<tr class="font-bold">
									<td><span class="text-white">RAM</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->ram}}</td>
											<td class=" "><span>DISPLAY</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->display}}</td>
								</tr>
				
								<tr class="font-bold">
									<td class=" "><span>STORAGE</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->storage}}</td>
									<td><span class="text-white">GRAPHICS</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->graphics}}</td>
								</tr>
				
							</table>
							<div class="product-options ">
								<label>
									<span class="text-white">Color</span>
									<select class="input-select">
										@foreach ($product->load('product_colors')->product_colors as $color)
										<option value="{{$color->id}}">{{$color->color_name}}</option>
										@endforeach
									</select>
								</label>
							</div>

							<!-- Add to Cart -->
							<div class="add-to-cart flex flex-nowrap space-x-4">

								<form
									action="/add-to-cart/{{$product->id}}"
									method="POST">
									@csrf
									<button type="submit" class="add-to-cart-btn ml-20px"><i class="fa fa-shopping-cart"></i> add to cart</button>
								
								</form>						
	
									<form action="/add-to-wishlist/{{$product->id}}" method="POST">
										@csrf
											<button 
											type="submit" 
											class="add-to-cart-btn ml-20px">
										<i class="fa fa-heart-o"></i>
										<span class="tooltipp">add to wishlist</span>
									</button>        
								</form>
			
							</div>
							<!-- Add to Cart -->

							<ul class="product-links text-white">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->
				</div>
				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							<li><a data-toggle="tab" href="#tab2">Details</a></li>
							<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p class="text-white">{{$product->description}}</p>
									</div>
								</div>
							</div>
							<!-- /tab1  -->

							<!-- tab2  -->
							<div id="tab2" class="tab-pane fade in">
								<div class="row">
									<div class="col-md-12">
											<table class=" table table-hover tm-product-table tm-table-small ">
								<tr class="font-bold">
									<td class=" "><span>PROCESSOR</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->processor}}</td>
									<td><span class="text-white">SCREEN-SIZE</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->screen_size}}</td>
								</tr>
						
								<tr class="font-bold">
									<td class=" "><span>BATTERY</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->battery}}</td>
									<td><span class="text-white">RAM</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->ram}}</td>
								</tr>
				
								<tr class="font-bold">
									<td class=" "><span>STORAGE</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->storage}}</td>
									<td><span class="text-white">GRAPHICS</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->graphics}}</td>
								</tr>
					
								<tr class="font-bold">
									<td class=" "><span>DISPLAY</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->display}}</td>
									<td><span class="text-white">OPREATION_SYSTEM</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->opreation_system}}</td>
								</tr>
								<tr class="font-bold">
									<td class=" "><span>PORT & CONNECTION</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->ports_and_connections}}</td>
									<td><span class="text-white">WARRANTY</span></td>
									<td class=" font-bold p-2  h-10 border   "> - {{$product->warranty}}</td>
								</tr>
							</table>
									</div>
								</div>
							</div>
							<!-- /tab2  -->

							<!-- tab3  -->
							<div id="tab3" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<div class="col-md-3">
										<div id="rating">
											<div class="rating-avg">
												<span>4.5</span>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<ul class="rating">
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 80%;"></div>
													</div>
													<span class="sum">3</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 60%;"></div>
													</div>
													<span class="sum">2</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Rating -->

									<!-- Reviews -->
									<div class="col-md-6">
										<div id="reviews">
											<ul class="reviews">
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
													</div>
												</li>
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
													</div>
												</li>
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
													</div>
												</li>
											</ul>
											<ul class="reviews-pagination">
												<li class="active">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- /Reviews -->

									<!-- Review Form -->
									<div class="col-md-3">
										<div id="review-form">
											<form class="review-form">
												<input class="input" type="text" placeholder="Your Name">
												<input class="input" type="email" placeholder="Your Email">
												<textarea class="input" placeholder="Your Review"></textarea>
												<div class="input-rating">
													<span>Your Rating: </span>
													<div class="stars">
														<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
														<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
														<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
														<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
														<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>
									<!-- /Review Form -->
								</div>
							</div>
							<!-- /tab3  -->
						</div>
						<!-- /product tab content  -->
					</div>
				</div>
				<!-- /product tab -->
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section related porducts -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

					<!-- product -->
					
					@php
						$related_products = $product->category->products()->limit(4)->get();
					@endphp

					@foreach ($related_products as $product)
					<div class="col-md-3 col-xs-6">
					
						<div class="product">
                        <a href="/product-details/{{ $product->id }}">
                            <div class="product-img">
                                <img src="{{asset($product->product_images->first()->product_image)}}" alt="">
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
					</div>
					@endforeach
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section related porducts -->
	</div>
</x-layout>