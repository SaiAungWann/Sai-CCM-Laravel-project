<x-layout>

	<div class="w-full pt-10 text-white">
             @php
                $wishListItems = auth()->user()->wish_list?->wish_list_items()->simplePaginate(5);
                $products = $wishListItems?->load('product')->pluck('product');
            @endphp

        @if ($wishListItems?->count())
        <table class="wishlist-table text-center">
                  <tr class=" font-bold text-center w-full border-b-2 h-10">
                    <th class="text-left">Product Name</th>
                   <th class="text-center">Image</th>
                    <th class="text-right">Price</th>
                    <th colspan="2" class="text-center">Action</th>
                  </tr>
            @foreach ($wishListItems as $wishListItem)

              <tr class="w-full text-center border-b-2  h-10">
                    <td class="text-left">{{$wishListItem->product->name}}</td>
                     <td class="text-center w-44 m-auto"><img src="{{asset('./access/img/product01.png')}}" class="img-fluid w-44 m-auto"></td>
                    <td class="text-right">$ {{$wishListItem->product->price}}</td>

                    <td class="text-red-500 text-right"><a href="/">
                         <form action="/wish_list_item/{{$wishListItem->id}}/delete" method="POST">                     
                            @csrf
                            <button type="submit">
                                <i class="fa fa-trash text-red-500"></i>
                            </button>
                      </form>
                    </td>

                    <td>
                        <form
							action="/add-to-cart/{{$wishListItem->product->id}}"
							method="POST">
							@csrf
							<button type="submit" class="add-to-cart-btn ml-20px">
                                 add to cart
                                <i class="fa fa-arrow-circle-right"></i>
                            </button>
						</form>
                    </td>
             </tr>
            
            @endforeach
             <tr class="w-full font-bold text-center border-b-2 h-10">
                    <td class="text-left">Total ({{$wishListItems->count()}})</td>
                    <td></td>
                    <td class="text-right">{{$wishListItems->sum('product.price')}}</td>
                    <td class="text-red-500 text-right">Delete All</td>
                     <td><a href="/checkout">Add All to Cart <i class="fa fa-arrow-circle-right"></i></a></td>
                  </tr>
        </table>
                <div class="font-bold text-center mx-auto">{{$wishListItems->links()}}</div>

        @else
        <p class="text-center font-bold">No item in wishlist</p>

        @endif
    </div>

</x-layout>