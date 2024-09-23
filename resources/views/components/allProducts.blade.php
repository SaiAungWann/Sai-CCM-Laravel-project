<!-- PORDUCT SECTION -->

<!-- Products tab & slick -->
<div class="col-md-12 h-100%">
    <div class="row">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab1" class="tab-pane active">

                <div class="products-slick" data-nav="#slick-nav-1">
                    <!-- product -->
                    @foreach ($products as $product)
                    <div class="product">
                        <a href="/product-details/{{ $product->id }}">
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
                                <x-productIcon :product="$product"></x-productIcon>

                            </div>
                        </a>
                    </div>
                    @endforeach
                    <!-- product -->
                </div>
            </div>
            <div id="slick-nav-1" class="products-slick-nav"></div>
        </div>
    </div>
</div>
    <!-- Products tab & slick -->