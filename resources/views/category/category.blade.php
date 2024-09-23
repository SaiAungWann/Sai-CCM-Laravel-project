<x-layout>

    <!-- Products tab & slick -->
    <div class="col-md-12 col-sm-6">
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title p-10 m-5">
                    <h3 class="title">Our Products</h3>
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
            <div class="products-tabs pb-4">
                <!-- tab -->
                <div id="tab1" class="tab-pane active container mx-auto">

                    <div class="products-slick" data-nav="#slick-nav-1">

                        <!-- product -->
                        @forelse ($products as $product)

                        <div class="product ">
                            <!-- <div class="product-category"> -->
                            <div class="product-img">
                                <img src="{{asset($product->image)}}" alt="">
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
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                    cart</button>
                            </div>

                            <!-- </div> -->
                        </div>

                        @empty
                        <h2>Product not found</h2>

                        <!-- product -->

                        @endforelse
                    </div>
                </div>
                <div id="slick-nav-1" class="products-slick-nav right-56"></div>
            </div>

        </div>
        <!-- Products tab & slick -->
    </div>

</x-layout>