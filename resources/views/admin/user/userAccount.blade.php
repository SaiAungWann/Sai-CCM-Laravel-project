<x-adminLayout>
    <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        @if ($users?->count())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">MIDDLE NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">PROFILE PICTURE</th>
                                    <th scope="col">PHONE NO.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if ($user->role == 'user')
                                    
                                <tr onclick="window.location='/admin/user/{{$user->id}}/account/profile'">
                                    <th scope="row"><b>{{$user->id}}</b></th>
                                    <td  class="text-center flex items-center justify-items-center flex-row">
                                        {{$user->first_name}}
                                    </td>
                                    <td>{{$user->middle_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="text-center">{{$user->role}}</td>
                                    <td><img src="{{asset($user->profile_picture)}}" width="40" class="img-fluid" alt=""></td>
                                    <td>{{$user->user_addresses?->first()?->phone_number}}</td>
                                </tr>                                   
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p><strong>No User For Today!</strong></p>
                        @endif
                    </div>
    </div>
</x-adminLayout>