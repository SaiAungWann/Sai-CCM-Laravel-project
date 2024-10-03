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
                                <h3 class="text-white font-bold text-lg"><a href="{{url('/user/'.auth()->user()->id.'/profile')}}">Profile</a></h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg"><a href="{{url('/user/'.auth()->user()->id.'/profile/order')}}">My Order</a></h3>
                            </div>
                    
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg"><a href="{{url('/user/'.auth()->user()->id.'/profile/orderHistory')}}">Order History</a></h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg"><a href="/wishlist">My Wishlist</a></h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <h3 class="text-white font-bold text-lg"><a href="user/{{auth()->user()->id}}/profile/edit">Profile Setting</a></h3>
                            </div>
                            <div class="aside border-b border-green-500 border-3px">
                                <form
                                action="/logout"
                                 method="POST">
                                    @csrf
                                <h3 class="text-white font-bold text-lg">						
							            <button
								            type="submit"
								            class="text-red-500 font-bold">Logout</button>
                                        </h3>
						            </form>
                            </div>
                        </div>
                        <div class="col-md-9">
                       {{$slot}}
                        </div>
                    </div>
                </div>
            </div>