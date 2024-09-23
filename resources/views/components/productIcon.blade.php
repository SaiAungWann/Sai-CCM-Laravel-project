<div class="product-rating">
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
</div>

<div class="product-btns">
    <form action="/add-to-wishlist/{{$product->id}}" method="POST">
        @csrf
        <button 
                type="submit" 
                class="add-to-wishlist">
            <i class="fa fa-heart-o"></i>
            <span class="tooltipp">add to wishlist</span>
        </button>        
    </form>
</div>

<div class="add-to-cart">
    <form
        action="/add-to-cart/{{$product->id}}"
        method="POST">
    @csrf
        <button type="submit" class="add-to-cart-btn ml-20px"><i class="fa fa-shopping-cart"></i> add to cart</button>
    </form>
</div>