<x-adminLayout>
      <div class="container mt-5 col-12">
        {{-- <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Accounts</h2>
              <p class="text-white">Accounts</p>
              <select class="custom-select">
                <option value="0">Select account</option>
                <option value="1">Admin</option>
                <option value="2">Editor</option>
                <option value="3">Merchant</option>
                <option value="4">Customer</option>
              </select>
            </div>
          </div>
        </div> --}}
   
        <!-- row -->
      <div class="flex items-top justify-between flex-row">
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                <h2 class="tm-block-title">Change Profile Picture</h2>
                <div class="tm-avatar-container">
                  
                  <img
                  src="{{asset(auth()->user()->profile_picture)}}"
                  id="profile-img"
                  name="profile_picture"
                  class="tm-avatar img-fluid mb-4"
                  
                  />
                </div>
                @error('profile_picture')
                <p>{{$message}}</p>
                @enderror
            </div>
          </div>

          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <form action="/user/{{auth()->user()->id}}/profile/update" class="tm-signup-form row" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group col-lg-6">
                  <label for="name">First Name</label>
                  <input
                    id="first_name"
                    name="first_name"
                    type="text"
                    class="form-control validate"
                    value="{{$user->first_name ,old('address') }}"
                    disabled
                  />
                  @error('first_name')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group col-lg-6">
                  <label for="name">Middle Name</label>
                  <input
                    id="middle_name"
                    name="middle_name"
                    type="text"
                    class="form-control validate"
                    value="{{$user->middle_name  ,old('address') }}"
                    disabled
                  />
                  @error('middle_name')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group col-lg-6">
                  <label for="name">Last Name</label>
                  <input
                    id="last_name"
                    name="last_name"
                    type="text"
                    class="form-control validate"
                    value="{{$user->last_name  ,old('address') }}"
                    disabled
                  />
                  @error('last_name')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                  <div class="form-group col-lg-6">
                  <label for="phone">Phone</label>
                  <input
                    id="telephone"
                    name="telephone"
                    type="tel"
                    class="form-control validate"
                    value="{{$user->user_addresses->first()?->telephone,old('telephone') }}"
                    disabled
                  />
                  @error('telephone')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                    value="{{$user->email,old('email') }}"
                    disabled
                  />
                  @error('email')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Role</label>
                  <input  name="rike" id="role" type="text" class="form-control validate" 
                  value="{{$user->role}}"
                  disabled
                  />
              
                  @error('email')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <hr><br>
                    
                <div class=" text-white">
                <p class="font-bold text-white"> Your Address</p>
                    <table class="table">
                        <thead>
                        <tr class=" h-10 font-bold border-collapse border-b-2 border-white space-y-4">
                        <td scope="col">No. </td>
                        <td scope="col">Address Name </td>
                        <td scope="col">Phone Number</td>
                        <td scope="col">state/region Township ZipCode</td>
                        <td scope="col">Address</td>
                        </tr>
                        </thead>
                        <tbody>
                                    @foreach ($user_addresses as $user_address)
                                    <tr class=" h-10 border-collapse border-b-2 border-white space-y-4">
                                        <td>{{$user_address->id}}</td>
                                        <td>{{$user_address->address_name}}</td>
                                        <td>{{$user_address->telephone}}</td>
                                        <td>{{$user_address->state_or_region_township_zip}}</td>
                                        <td>{{$user_address->address}}</td>
                                      
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
</x-adminLayout>