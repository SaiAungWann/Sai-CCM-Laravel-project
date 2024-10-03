<x-layout>
 

      <!-- SECTION-->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <form action="/user/address/store" method="POST">
           @csrf
           @method('POST')
           {{-- {{dd(request()->all())}} --}}
      <div class="row">
        <div class="col-md-7 text-white">
          <!-- shipping Details -->
          <div class="billing-details text-black">
            <div class="section-title">
              <h3 class="title text-white">Shipping address</h3>
            </div>
            <div class="form-group">
              <input
                class="input"
                type="text"
                name="first_name"
                value="{{ auth()->check() ? auth()->user()->first_name : '' , old('first_name') }}"
                placeholder="First Name" />
                @error('first_name')  
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
              <input
                class="input"
                type="text"
                name="last_name"
                value="{{ auth()->check() ? auth()->user()->last_name : '' , old('last_name') }}"
                placeholder="Last Name" />
                            @error('last_name')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
              <input
                class="input"
                type="email"
                name="email"
                value="{{ auth()->check() ? auth()->user()->email : '' , old('email') }}"
                placeholder="Email" />
                            @error('email')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
              <input
                class="input"
                type="address_name"
                name="address_name"
                value="{{ auth()->check() ? auth()->user()->user_addresses->first()?->address_name : '' , old('address_name') }}"
                placeholder="Address Name" />
                            @error('address_name')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
              <div class="form-group">
                <select name="SRTZ" id="SRTZ" class="input">
                  
                  <option value="" selected >Select a State/Region - Township - Zip Code</option>

                  <option value="{{  auth()->user()->user_addresses->first()?->state_or_region_township_zip  }}">{{ auth()->user()->user_addresses->first()?->state_or_region_township_zip }}</option>


                  @foreach ($townships as $township)
             
              <option value="{{  $township->stateOrRegion->name . ' - ' . $township->name . ' - ' . $township->zip_code  }}">{{ $township->stateOrRegion->name . ' - ' . $township->name . ' - ' . $township->zip_code}}</option>
              @endforeach
            </select>
                        @error('SRTZ')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
          </div>
            <div class="form-group">
              <input
                class="input"
                type="text"
                name="address"
                value="{{auth()->check() ? auth()->user()->user_addresses->first()?->address : '' ,old('address') }}"
                placeholder="Address" />
                            @error('address')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group text-black">
              <input
                class="input"
                type="tel"
                name="telephone"
                value="{{auth()->check() ? auth()->user()->user_addresses->first()?->telephone : '' , old('telephone') }}"
                placeholder="Telephone" />
               @error('telephone')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
            </div>
            </div>
            
          <!-- /shipping Details -->

          {{-- correct address --}}  
            
          <div class="input-checkbox">
            <input type="checkbox" id="my_address_is_correct" name="my_address_is_correct"/>
            
            <label for="my_address_is_correct">
              <span></span>
              My Address is correct.
            </label>
            @error('my_address_is_correct')
                <p class="text-red-400 my-4">{{ $message }}</p>
            @enderror
          </div>
        </div>
          <div class="col-md-5 text-white">
            {{-- terms and conditions --}}
          <div class="billing-details text-black">
            <div class="section-title">
                <h3 class="title text-white">Terms and Conditions</h3>
            
            </div>
            <div>
                <h3 class="title text-white">Terms</h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae beatae esse ea officia, consequatur ullam ex omnis numquam enim dolore distinctio sint nostrum inventore, pariatur dolorem praesentium sit tempore perspiciatis. Laboriosam incidunt voluptas perspiciatis natus dignissimos quis! Voluptatibus harum hic vel delectus. Corrupti reiciendis nulla saepe optio ullam unde?</p>
            </div>
            <br>
            <div>
                <h3 class="title text-white">Conditions</h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae beatae esse ea officia, consequatur ullam ex omnis numquam enim dolore distinctio sint nostrum inventore, pariatur dolorem praesentium sit tempore perspiciatis. Laboriosam incidunt voluptas perspiciatis natus dignissimos quis! Voluptatibus harum hic vel delectus. Corrupti reiciendis nulla saepe optio ullam unde?</p>
            </div>
            </div>
            </div>

            @if (request()->id)
                <form action="/user/address/update" method="POST" @csrf @method('PUT')>
                  <button type="submit" class="primary-btn order-submit w-full">Update Address </button>
                </form>
                @endif
                <button type="submit" class="primary-btn order-submit w-full">Add Address </button>
              
      </div>
      </form>
      <!-- /row -->


    <!-- /container -->
  </div>
  <!-- /SECTION -->
  <script>
      document.getElementById('my_address_is_correct').addEventListener('submit', function(event) {
        const termsCheckbox = document.getElementById('my_address_is_correct');
        
        if (!termsCheckbox.checked) {
            alert('You must agree to that your address is to submit the form.');
            event.preventDefault();  // Prevent form submission
        }
    });
    </script>
</x-layout>