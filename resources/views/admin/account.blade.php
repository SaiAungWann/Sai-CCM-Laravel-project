<x-adminLayout>
      {{-- <div class="container mt-5 col-12"> --}}
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
      {{-- <div class="flex items-top justify-between flex-row">
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <form action="/user/{{auth()->user()->id}}/profile/updateProfilePicture" method="POST" enctype="multipart/form-data" class="tm-edit-product-form">
                @csrf
                @method('POST')

                <h2 class="tm-block-title">Change Profile Picture</h2>
                <div class="tm-avatar-container">
                  
                  <img
                  src="{{asset(auth()->user()->profile_picture)}}"
                  id="profile-img"
                  name="profile_picture"
                  class="tm-avatar img-fluid mb-4"
                  />
                  <input
                  id="fileInput"
                  name="profile_picture"
                  type="file"
                  class="btn btn-primary btn-block mx-auto "
                  >
                </div>
                @error('profile_picture')
                <p>{{$message}}</p>
                @enderror
                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                  Upload New Photo
                </button>
              </form>
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
                    value="{{auth()->check() ? auth()->user()->first_name : '' ,old('address') }}"
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
                    value="{{auth()->check() ? auth()->user()->middle_name : '' ,old('address') }}"
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
                    value="{{auth()->check() ? auth()->user()->last_name : '' ,old('address') }}"
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
                    value="{{auth()->check() ? auth()->user()->user_addresses->first()?->telephone : ' ' ,old('telephone') }}"
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
                    value="{{auth()->check() ? auth()->user()->email : '' ,old('email') }}"
                  />
                  @error('email')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Role</label>
                  <select
                    id="role"
                    name="role"
                    class="form-control validate h-auto"
                        >
                        <option value="admin" {{auth()->user()->role == 'admin' ? 'selected' : ''}}>Admin</option>
                        <option value="user" {{auth()->user()->role == 'user' ? 'selected' : ''}}>User</option>
                      </select>
              
                  @error('email')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                  <div class="form-group col-lg-12">
                    <button
                    type="submit"
                    class="btn border rounded-xl btn-primary btn-block text-uppercase text-white font-bold"
                    >
                    Update Your Profile
                  </button>
                </div>
                </form>
              
                <br>
                <h2 class="tm-block-title">Change Password</h2>

                <form action="/user/{{auth()->user()->id}}/profile/updatePassword" class="tm-signup-form row" method="POST">
                @csrf
                @method('POST')
                <div class="form-group col-lg-6">
                  <label for="old_password">Old Password</label>
                  <input
                    id="old_password"
                    name="old_password"
                    type="password"
                    class="form-control validate"
                    value="{{old('old_password') }}"
                  />
                  @error('old_password')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group col-lg-6">
                  <label for="new_password">New Password</label>
                  <input
                    id="new_password"
                    name="new_password"
                    type="password"
                    class="form-control validate"
                  />
                  @error('new_password')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group col-lg-6">
                  <label for="new_password_confirmation">Re-enter Password</label>
                  <input
                    id="new_password_confirmation"
                    name="new_password_confirmation"
                    type="password"
                    class="form-control validate"
                  />
                  @error('new_password_confirmation')
                  <p>{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Update Password
                  </button>
                </div> 
                </form>
                <br>
                 <form action="">
                <div>

                  <button
                  type="submit"
                  class=" w-full btn border btn-danger rounded-xl btn-block text-uppercase text-white font-bold"
                  >
                  Delete Your Account
                </button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

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
                                @if ($user->role == 'admin')
                                    
                                <tr onclick="window.location='/admin/account/{{$user->id}}/profile'">
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