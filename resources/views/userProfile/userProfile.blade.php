<x-layout>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h3 class="title">User Profile</h3>
                </div>
                <div class="col-md-12">

					<!-- aside Widget-->
                        <div id="aside" class="col-md-3 sticky top-0">
                            <div class="active aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg">Profile</h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg">My Order</h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg">Order History</h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg">My Wishlist</h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg">Transication History</h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg">Profile Setting</h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg">Logout</h3>
                            </div>
                        </div>
					<!-- /aside Widget -->
                            {{-- profile picture --}}
                            <div class="col-md-9">
                                <div class="h-40 p-5 flex flex-row items-center tm-bg-primary-dark border-spacing-1 rounded-xl">
                                    <div class="border-4 ml-4 border-yellow-500 rounded-full">
                                        <img
                                            src="{{asset('./access/img/admin-avatar.png')}}"
                                            alt=""
                                            class="w-28 h-28 border-4 border-yello-500 rounded-full "
                                        >
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-bold text-2xl text-white ">User Name Here</p>
                                        <p class=" text-white text-m">User Email Here ,<span>  +91 123456789</span>  <span>  Edit Icon</span></p>
                                    </div>
                                </div>
                            </div>
                        {{-- address --}}
                        <div class="col-md-9">
                            <div class="h-40 mt-5 mb-5 p-5 flex flex-col items-left tm-bg-primary-dark border-spacing-1 rounded-xl text-white">
                                <p class="font-bold text-white"> User Address</p>
                                <div>
                                    <p class=" text-white ">  User Address 1 </p>
                                    <p class="  text-white "> Thailand , Samut Pakran , 10270 , Santi Kham 4, Pratran Porn Mension <span><button> Edit </button></span></p>
                                    
                                </div>

                                <div class="bg-yellow-500 border-collapse rounded-lg w-fit p-1 pl-2 pr-2">
                                    <button> + Add Address </button>
                                </div>
                            </div>
                        </div>
                        

                    <div class="col-md-9">
                        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll border-spacing-1 rounded-xl">
                            <h2 class="tm-block-title">Orders List</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ORDER NO.</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">OPERATORS</th>
                                        <th scope="col">LOCATION</th>
                                        <th scope="col">DISTANCE</th>
                                        <th scope="col">START DATE</th>
                                        <th scope="col">EST DELIVERY DUE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $orders = \App\Models\Order::all()->load('user');
                                    @endphp
                                    @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row"><b>{{$order->id}}</b></th>
                                        <td>
                                            <div class="tm-status-circle moving">
                                            </div>{{$order->status}}
                                        </td>
                                        <td><b>{{$order->user->name}}</b></td>
                                        <td><b>{{$order->shipping_address ?? 'London (Example)'}} </b></td>
                                        <td><b>485 km (Example)</b></td>
                                        <td>
                                            {{-- <p>{{ $formattedDate }}</p> --}}
                                        </td>
                                        <td>08:00, 18 NOV 2024 (for Example) </td>
                                    </tr>
                                    @endforeach
                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>