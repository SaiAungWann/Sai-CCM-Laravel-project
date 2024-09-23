   <x-adminLayout>
      <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
             <h2 class="tm-block-title">Orders Item for: {{$order->user->first_name}} {{$order->user->middle_name}} {{$order->user->last_name}}</h2>
             <h2 class="tm-block-title">Order ID: {{$order->id}}</h2>
                <form action="/admin/order/{{ $order->id }}/update" method="POST">
                                        @csrf
                                        @method('PUT')
             <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">PRODUCT ID</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">IN STOCK</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col" class="text-center">STATUS</th>
                                    <th scope="col" class="text-center">ACTION</th>
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
                                <td class="text-left">{{$orderItem->product->in_stock}} <p>In Stock</p></td>
                                <td> {{$orderItem->product->quantity}} <p>Quantity</p></td>
                                <td>$ {{$orderItem->product->price}}</td>
                                <td>

                                </td>

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
                                <td>$ {{$orderItems->sum('product.price')}}</td>
                                @else
                                <td>$ 0</td>
                                @endif
                                <td>                                     
                                    <ul class="order-status">
                                        <li class="nav-item dropdown">
                                            <select name="status" id="status"                         class="custom-select tm-select-accounts text-center text-white"> 
                                                <option value="pending" selected class="space-y-6 ">Pending</option>
                                                <option value="processing">
                                                    Processing
                                                </option>
                                                <option value="delivered">Delivered</option>
                                                <option value="declined">declined</option>
                                            </select>
                                        </li>
                                    </ul></td>
                                <td>


                                        <button type="submit" class="btn-primary-dark h-5order-submit w-full">
                                            {{-- <i class="fa fa-trash text-red-500"></i> --}}
                                            UPDATE STATUS
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
         </div>
    </div>  

</x-adminLayout>