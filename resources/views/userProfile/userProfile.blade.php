<x-layout>
    <x-userProfileLayout>
					<!-- /aside Widget -->
                            {{-- profile picture --}}
                            <div>
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
                        <div >
                            <div class=" mt-5 mb-5 p-5 flex flex-col items-left tm-bg-primary-dark border-spacing-1 rounded-xl text-white">
                                <p class="font-bold text-white"> Your Address</p>
                                <table>
                                    <tr class=" h-10 font-bold border-collapse border-b-2 border-white space-y-4">
                                        <td>Address Name </td>
                                        <td>Phone Number</td>
                                        <td>state/region Township ZipCode</td>
                                        <td>Address</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach ($user_addresses as $user_address)
                                    <tr class=" h-10 border-collapse border-b-2 border-white space-y-4">
                                        <td>{{$user_address->address_name}}</td>
                                        <td>{{$user_address->telephone}}</td>
                                        <td>{{$user_address->state_or_region_township_zip}}</td>
                                        <td>{{$user_address->address}}</td>
                                        <td><button> <a href="/user/address/{{$user_address->id}}/edit" class="text-white border border-white rounded p-1 bg-yellow-500">Edit</a> </button></td>
                                    </tr>
                                        
                                    @endforeach
                                </table>
                                <br>
                                <div class="bg-yellow-500 border-collapse rounded-lg w-fit p-1 pl-2 pr-2">
                                    <button><a href="/user/address/create"> + Add New Address</a> </button>
                                </div>
                            </div>
                        </div>
                        
    </x-userProfileLayout>
</x-layout>