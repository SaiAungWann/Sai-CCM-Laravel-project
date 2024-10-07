<x-layout>
    <x-userProfileLayout>
                <style>
            .table tbody tr td,.table thead tr th,.table th {
                vertical-align: middle
            }
        </style>
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
             <h2 class="tm-block-title">Orders Item for: {{$order->user->first_name}} {{$order->user->middle_name}} {{$order->user->last_name}}</h2>
             <h2 class="tm-block-title">Order ID: {{$order->id}}</h2>
             <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">PRODUCT ID</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">PRODUCT IMAGE</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">PRICE</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $orders = \App\Models\Order::all()->load('user');
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $orders[0]->created_at)->format('d M Y');                                  
                                    $orderItems = \App\Models\OrderItem::where('order_id', $order->id)->get();
                                @endphp
                                @if ($orderItems?->count())
                            @foreach ($orderItems->load('product') as $orderItem)
                            <tr class="w-full text-center border-b-2 space-y-6 h-10">
                                <td class="text-left">{{$orderItem->product->id}}</td>
                                <td class="text-left">{{$orderItem->product->name}}</td>
                                <td class="text-left"><img class="w-20" src="{{asset($orderItem->product->load('product_images')->product_images->first()->product_image)}}" alt=""></td>
                                <td> {{$orderItem->quantity}}</td>
                                <td>$ {{$orderItem->total_price}}</td>

                            </tr>
                            @endforeach
                            @else
                            <p>Your cart is empty</p>
                            @endif
                            
                               <tr>
                                <td>Shipping Fee</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center col-span-4"><strong>FREE</strong></td>
                            </tr>

                            <tr class="w-full font-bold text-center border-b-2 space-y-6 h-10">
                                <td class="text-left col-span-3">Total</td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                <td class="text-left"></td>
                                @if ($orderItems?->count())
                                <td>$ {{$orderItems->sum('total_price')}}</td>
                                @else
                                <td>$ 0</td>
                                @endif
                            </tbody>
                        </table>
         </div> 

    </x-userProfileLayout>
</x-layout>