<x-layout>
    <x-userProfileLayout>
        <div class=" m-2 tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll border-spacing-1 rounded-xl">
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
    </x-userProfileLayout>
</x-layout>