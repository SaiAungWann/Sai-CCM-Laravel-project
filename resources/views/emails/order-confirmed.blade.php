<x-emailLayout>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Thank you for your order!</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Hello, <strong> {{$name}} </strong> </p>
            <p>Your order has been Confirmed. We are happy to let you know that your package is on the way!</p>
            <p>Here are your order details:</p>

            <div class="order-details">
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount) }}</p>
                {{-- <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p> --}}
                
                <table class="table">
                  <tr class="rowOne">
                    <td >Product Name</td>
                    <td >Image</td>
                    <td >Quantity</td>
                    <td >Price</td>
                    <td >Total</td>                 
                  </tr>

                  @if ($order->orderItems->count())


                  @foreach ($order->orderItems->load('product') as $orderItem)
                  <tr class="rowTwo">
                        <td class="">{{$orderItem->product->name}}</td>
                        <td class="image"> <img src="{{asset($orderItem->product->image)}} "></td>
                        <td class="">{{$orderItem->quantity}}</td>
                          
                         <td>
                           <span>$</span> 
                           <span class="price">  {{$orderItem->total_price}}</span>
                        </td>
                        <td>

                            <p class="total"">$ {{$orderItem->quantity * $orderItem->total_price}}</p>
                        </td>
                  </tr>

                  @endforeach

                  @else
                  <p>Your cart is empty</p>
                  @endif

                  <tr class="w-full font-bold text-center border-b-2 space-y-6 h-10">
                    <td class="text-left" colspan="4">Shipping Fee</td>
                    @if ($order->orderItems->count())
                    <td><span class="grand_total" name="grand_total">Free</span></td>
                    @else
                    <td>$ 0</td>
                    @endif
                    
                  </tr>
                  <tr class="w-full font-bold text-center border-b-2 space-y-6 h-10">
                    <td class="text-left" colspan="4">Total</td>
                    @if ($order->orderItems->count())
                    <td><span class="grand_total" name="grand_total">$ {{$order->total_amount}}</span></td>
                    @else
                    <td>$ 0</td>
                    @endif
                    
                  </tr>
                </table>
                <h2>Thank you for shopping with us.</h2>

            </div> 
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>If you have any questions, feel free to <a href="{{ url('/contact') }}">contact us</a>.</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</x-emailLayout>

