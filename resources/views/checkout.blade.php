<x-layout>

  <!-- BREADCRUMB -->
  <div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <h3 class="breadcrumb-header">Checkout</h3>
          <ul class="breadcrumb-tree">
            <li><a href="#">Home</a></li>
            <li class="active">Checkout</li>
          </ul>
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /BREADCRUMB -->

  <!-- SECTION-->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <form action="/orders/store" method="POST">
           @csrf
           @method('POST')
           {{-- {{dd(request()->all())}} --}}
      <div class="row">
        <div class="col-md-5 text-white">
          <!-- shipping Details -->
        <div class="billing-details text-black">
            <div class="section-title">
              <h3 class="title text-white">Shipping address</h3>
            </div>
            <div class="form-group">
              <input
              disabled
                class="input"
                type="text"
                name="first_name"
                value="{{ auth()->check() ? auth()->user()->first_name : '' , old('first_name') }}"
                placeholder="First Name" />
                @error('first_name')  
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
              <input
                disabled
                class="input"
                type="text"
                name="last_name"
                value="{{ auth()->check() ? auth()->user()->last_name : '' , old('last_name') }}"
                placeholder="Last Name" />
                            @error('last_name')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
              <input
                disabled
                class="input"
                type="email"
                name="email"
                value="{{ auth()->check() ? auth()->user()->email : '' , old('email') }}"
                placeholder="Email" />
                            @error('email')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
              <select name="shipping_address" id="shipping_address" class="input h-20">

                <option value=""> Select an address</option>
                @foreach ($user_addresses as $user_address)
                <option value="{{ $user_address->address_name . ' - ' .
                   $user_address->state_or_region_township_zip . ' - ' .
                   $user_address->address }}" id="{{ $user_address->id }}" class="shipping_address">
                  {{$user_address->address_name . ' - ' .
                   $user_address->state_or_region_township_zip . ' - ' .
                   $user_address->address }}
                </option>
                  @endforeach
              </select>
                @error('address_name')
                <p class="text-red-400 my-4">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group text-black">
                <select name="telephone" id="telephone" class="input">
                  @foreach ($user_addresses as $user_address)
                      <option value="{{auth()->check() ? $user_address->telephone : '' , old('telephone') }}">{{ $user_address->telephone}}</option>
                  @endforeach
                </select>
               @error('telephone')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            @if (auth()->user()->user_addresses->count() == 0)
            <div class="form-group text-black">
              <h3>I Don't Have An Address</h3> <br>
                <a href="/user/address/create/" class="btn btn-primary btn-block">Add New Address</a>
            </div>
                
            @endif
            
          <!-- /shipping Details -->

          {{-- correct address --}}  
            
          <div class="input-checkbox">
            <input type="checkbox" id="my_address_is_correct" name="my_address_is_correct"/>
            
            <label for="my_address_is_correct">
              <span></span>
              My Address is correct.
            </label>
            @error('my_address_is_correct')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
          </div>
       
        
        </div>
        </div>

        <!-- Order Details -->
      <div class="col-md-7 order-details h-full text-white">

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
                  $cart = auth()->user()->cart;
                  $cartItems = auth()->user()->cart?->cart_items()->get();
                  ?>
                  @if ($cartItems?->count())

                  @foreach ($cartItems->load('product') as $cartItem)

                  <tr class="w-full text-center border-b-2 space-y-6 h-10">
                        <td class="text-left">{{$cartItem->product->name}}</td>
                          <td class="text-center font-bold w-24">
                            <input type="hidden" name="quantity[{{$cartItem->id}}]" value="{{$cartItem->quantity}}">
                            {{$cartItem->quantity}}
                          </td>
                         <td>
                          <input type="hidden" name="price[{{$cartItem->id}}]" value="{{$cartItem->product->price}}">
                               <span>$</span> <span class="price" data-product-id="{{$cartItem->id}}">  {{$cartItem->product->price}}</span>
                            <td id="total-pirce">
                              @php
                                $total_price = $cartItem->quantity* $cartItem->product->price;
                                @endphp
                             $ {{$total_price}}
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

                    <input type="hidden" name="total_amount" value="{{$cartItems->load('product')->sum('total_price')}}">
                    <td><span class="grand_total"> $ {{$cartItems->load('product')->sum('total_price')}}</span></td>
                    
                    @else
                    <td>$ 0.00</td>
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
              <div><strong class="order-total"><p class="grand_total">$ {{$cartItems->load('product')->sum('total_price')}}
              </p></strong></div>
              @else
              <div><strong class="order-total">$ 0</strong></div>
              @endif
            </div>
          </div>

          <div class="payment-method">
            <div class="input-radio">
              <input type="radio" name="payment" id="payment-1" />
              <label for="payment-1">
                <span></span>
                Direct Bank Transfer
              </label>
              <div class="caption">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua.
                </p>
              </div>
            </div>

            <div class="input-radio">
              <input type="radio" name="payment" id="payment-2" />
              <label for="payment-2">
                <span></span>
                Cheque Payment
              </label>
              <div class="caption">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua.
                </p>
              </div>
            </div>

            <div class="input-radio">
              <input type="radio" name="payment" id="payment-3" />
              <label for="payment-3">
                <span></span>
                Paypal System
              </label>
              <div class="caption">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua.
                </p>
              </div>
            </div>

          </div>


          <div class="input-checkbox">
            <input type="checkbox" id="terms" />
            <label for="terms">
              <span></span>
              I've read and accept the <a href="#">terms & conditions</a>
            </label>
          </div>
                <button type="submit" class="primary-btn order-submit w-full">PLace Order</button>
          </form>
        </div>
        <!-- /Order Details -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /SECTION -->

  		<script src="{{asset('./access/js/checkout.js')}}"></script>
</x-layout>