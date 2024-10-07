     <x-layout>
    <x-userProfileLayout>   
        
       <div class="flex items-top justify-around">
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
                <div class="form-group col-lg-12">
                  <label for="email">Account Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                    value="{{auth()->check() ? auth()->user()->email : '' ,old('email') }}"
                    disabled
                  />
                  @error('email')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                  <div class="form-group col-lg-12">
                    <button
                    type="submit"
                    class="btn border rounded-xl bg-yellow-500 btn-block text-uppercase text-white font-bold"
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
                  class=" w-full btn border rounded-xl bg-red-500 btn-block text-uppercase text-white font-bold"
                  >
                  Delete Your Account
                </button>
              </div>
              </form>
              </div>
            </div>
          </div>
    </div>
    </x-userProfileLayout>
</x-layout>