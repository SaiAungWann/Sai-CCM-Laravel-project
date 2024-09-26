<x-layout>

  <!-- SECTION-->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">

        <!-- Order Details -->
        <div class="col-md-12 order-details h-full text-white">
            <?php
            $cartItems = auth()->user()->cart?->cart_items()->get();
                  ?>
            @if ($cartItems?->count())

            @foreach ($cartItems->load('product') as $cartItem)
           <form action="/cart/checkout/{{$cartItem->id}}/update" method="POST">
           @csrf
           @method('PUT')
           @endforeach
           @endif
          <div class="section-title text-center">
            <h3 class="title">Your Order</h3>
          </div>
          <div class="order-summary">
            <div class="order-products">
              <div class="order-col">
                <table class="w-full">
                  <tr class=" font-bold text-center w-full border-b-2 space-y-6 h-10">
                    <td class="text-left">Product Name</td>
                    <td class="text-center">Quantity</td>
                    <td >Price</td>
                    <td >Total</td>
                    <td>Action</td>
                  </tr>

                  <?php
                  $cartItems = auth()->user()->cart?->cart_items()->get();
                  ?>
                  @if ($cartItems?->count())

                  @foreach ($cartItems->load('product') as $cartItem)

                  @php
                      // dd($cartItem->product->name);
                  @endphp
                  <tr class="w-full text-center border-b-2 space-y-6 h-10">
                        <td class="text-left">{{$cartItem->product->name}}</td>
                          <td class="text-center text-black font-bold w-24">
                              <div class="qty-label">
                                  <div class="input-number">
                                      <input type="number" value="1" name="quantity[{{$cartItem->id}}]" class="quantity" data-product-id="{{$cartItem->id}}">
                                      <span class="qty-up" data-product-id="{{$cartItem->id}}">+</span>
                                      <span class="qty-down" data-product-id="{{$cartItem->id}}">-</span>
                                  </div>
                              </div>
                          </td>
                         <td>
                           <span>$</span> 
                           <span class="price" data-product-id="{{$cartItem->id}}">  {{$cartItem->total_price}}</span>
                           
                           {{-- <input type="hidden" name="total_price[{{$cartItem->id}}]" id="total_price_input" data-product-id="{{$cartItem->id}}"> --}}
                           <td id="total-pirce">
                                <p class="total" data-product-id="{{$cartItem->id}}"></p>
                            </td>
                          <td>

                            <form action="/cart_items/{{$cartItem->id}}/delete" method="POST">                
                              @csrf
                              <button type="submit">
                              <i class="fa fa-trash text-red-500"></i>
                            </button>
                            </form>
                            
                          </td>
                  </tr>

                  @endforeach

                  @else
                  <p>Your cart is empty</p>
                  @endif

                  <tr class="w-full font-bold text-center border-b-2 space-y-6 h-10">
                    <td class="text-left">Total</td>
                    <td></td>
                    <td></td>
                    @if ($cartItems?->count())
                    <td><span class="grand_total" name="grand_total">$0.00</span></td>
                    @else
                    <td>$ 0</td>
                    @endif
                    
                    <td class="text-red-500">
                      <form action="/cart/{{$cart->id}}/delete/all" method="POST">                     
                        @csrf
                        <button type="submit"  
                        class="border-[1px] border-gray-300 py-3 px-5 bg-red-500 text-white">
                        Delete All</button>
                      </form>                      
                    </td>
                  </tr>
                </table>

              </div>

            </div>
            <div class="order-col">
              <div>Shiping</div>
              <div><strong>FREE</strong></div>
            </div>
            <div class="order-col">
              <div><strong>TOTAL</strong></div>
              @if ($cartItems?->count())
              <div><strong class="order-total"><p class="grand_total">$0.00 
              </p></strong></div>
              @else
              <div><strong class="order-total">$ 0</strong></div>
              @endif
            </div>
          </div>
          <div class="input-checkbox">
            <input type="checkbox" id="terms" />
            <label for="terms">
              <span></span>
              I've read and accept the <a href="#">terms & conditions</a>
            </label>
             <input type="hidden" name="grand_total" id="all_total">  
          </div>
                <button type="submit" class="primary-btn order-submit w-full">Check Out</button>
          </form>
        </div>
        <!-- /Order Details -->
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /SECTION -->
  		<script src="{{asset('./access/js/cart.js')}}"></script>

</x-layout>