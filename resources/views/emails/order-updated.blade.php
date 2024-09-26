<x-emailLayout>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Thank you for your order!</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Hello, {{$name}}.</p>

            @switch($order->status)
                @case( 'shipping' )
                    Your order have been <strong>shipping successfully. </strong>
                    @break
                @case( 'delivered' )
                    Your order have been <strong>delivered successfully.</strong>
                    @break
                @case( 'declined' )
                    Your order have been <strong class="text-red-500">declined.</strong>
                    @break
                @default
                    Your order is being <strong>processed.</strong>
            @endswitch

            <p>We are happy to let you know that your package is on the way!</p>
            <p>Here are your order details:</p>

            <div class="order-details">
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                <p><strong>Shdress Shipping Address:</strong>
                     {{ $order->shipping_ad}}</p>
            </div> 
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>If you have any questions, feel free to <a href="{{ url('/contact') }}">contact us</a>.</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
    </x-emailLayout>
