<x-adminLayout>
        <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add New Brands</h2>
                 <form 
                   action="/admin/brand/create" 
                   method="POST" 
                   enctype="multipart/form-data" 
                   class="tm-edit-product-form">
                     @csrf
                @method('POST')

            <div class="row tm-edit-product-row">    
                <div class="col-xl-6 col-lg-6 col-md-12">

                    {{-- Product Image --}}
                        <div class="form-group mb-3">
                            <label for="">Brand Image</label> <br>
                            <img  id="imagePreview" class="img-fluid" name="image">
                            <input
                                id="fileInput"
                                name="image"
                                type="file"
                                class="btn btn-primary btn-block mx-auto "
                            >
                            @error('image')
                            <p class="text-red-400 my-4">{{$message}}</p>
                            @enderror
                        </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12">
                    {{-- Brand Name --}}
                        <div class="form-group mb-3">
                          <label
                            for="name"
                            >Brand Name
                          </label>
                          <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{old('name')}}"
                            class="form-control w-100%"
                          />
                          @error('name')
                          <p class="error">{{ $message }}</p>
                          @enderror
                        </div>

                        {{-- Brand slug --}}
                        <div class="form-group mb-3">
                          <label
                            for="slug"
                            >Brand Slug
                          </label>
                          <input
                            id="slug"
                            name="slug"
                            type="text"
                            value="{{old('slug')}}"
                            class="form-control validate"
                          />@error('slug')
                          <p class="error">{{ $message }}</p>
                              
                          @enderror
                        </div>
                </div>
            </div>
             <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Brand Now</button>
              </div>

            </form>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
</x-adminLayout>