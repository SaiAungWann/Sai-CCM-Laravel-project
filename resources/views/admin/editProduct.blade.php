<x-adminLayout>
        <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Update Product</h2>
                 <form 
                   action="/admin/product/{{$product->id}}/update" 
                   method="POST" 
                   enctype="multipart/form-data" 
                   class="tm-edit-product-form">
                     @csrf
                      @method('PUT')

              <div class="row tm-edit-product-row">

              <div class="col-xl-6 col-lg-6 col-md-12">
                 {{-- Product Image --}}
                <div class="form-group mb-3">
                    <label for="">Product Image</label> <br>
                    <img src="{{old('image', $product->product_images->find($product->product_images->first()->id)->product_image)}}" id="imagePreview1" class="img-fluid" name="image1[]">
                    <input
                        id="fileInput1"
                        name="image1[]"
                        type="file"
                        class="btn btn-primary btn-block mx-auto "
                        value="{{old('image', $product->product_images->find($product->product_images->first()->id)->product_image)}}"
                    >
                    @error('image')
                    <p class="text-red-400 my-4">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Product Image</label> <br>
                    <img src="{{old('image', $product->product_images->find($product->product_images->skip(1)->first()->id)->product_image)}}" id="imagePreview2" class="img-fluid" name="image2[]">
                    <input
                        id="fileInput2"
                        name="image2[]"
                        type="file"
                        class="btn btn-primary btn-block mx-auto "
                        value="{{old('image', $product->product_images->find($product->product_images->skip(1)->first()->id)->product_image)}}"
                    >
                    @error('image')
                    <p class="text-red-400 my-4">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Product Image</label> <br>
                    <img src="{{old('image', $product->product_images->find($product->product_images->skip(2)->first()->id)->product_image)}}" id="imagePreview3" class="img-fluid" name="image">
                    <input
                        id="fileInput3"
                        name="image3[]"
                        type="file"
                        class="btn btn-primary btn-block mx-auto "
                        value="{{old('image', $product->product_images->find($product->product_images->skip(2)->first()->id)->product_image)}}"
                    >
                    @error('image')
                    <p class="text-red-400 my-4">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Product Image</label> <br>
                    <img src="{{old('image', $product->product_images->find($product->product_images->skip(3)->first()->id)->product_image)}}" id="imagePreview4" class="img-fluid" name="image4[]">
                    <input
                        id="fileInput4"
                        name="image4[]"
                        type="file"
                        class="btn btn-primary btn-block mx-auto "
                        value="{{old('image', $product->product_images->find($product->product_images->skip(3)->first()->id)->product_image)}}"
                    >
                    @error('image')
                    <p class="text-red-400 my-4">{{$message}}</p>
                    @enderror
                </div>
              </div>

                
                                     <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                  {{-- Product Name --}}
                    <div class="form-group mb-3">
                      <label
                        for="name"
                        >Product Name
                      </label>
                      <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{old('name', $product->name)}}"
                        class="form-control validate"
                      />
                      @error('name')
                      <p class="error">{{ $message }}</p>
                      @enderror
                    </div>
                  {{-- Product slug --}}
                    <div class="form-group mb-3">
                      <label
                        for="slug"
                        >Product Slug
                      </label>
                      <input
                        id="slug"
                        name="slug"
                        type="text"
                        value="{{old('slug', $product->slug)}}"
                        class="form-control validate"
                      />@error('slug')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                

                {{-- Product Price and discounted_percentage --}}
                <div class="row">
                  {{-- Product Price --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="price"
                        >Product Price
                      </label>
                      <input
                        id="price"
                        name="price"
                        type="number"
                        value="{{old('price' , $product->price)}}"
                        class="form-control validate"
                      />
                      @error('price')
                          
                      <p class="error">{{ $message }}</p>
                      @enderror
                    </div>
                  {{-- Product discount percentage --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="discounted_percentage"
                        >Discount Percentage
                      </label>
                      <input
                        id="discounted_percentage"
                        name="discounted_percentage"
                        type="number"
                        value="{{old('discounted_percentage' , $product->discounted_percentage)}}"
                        class="form-control validate"
                      />
                      @error('discounted_percentage')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>

                </div>
                {{-- New Arival and Top Seller --}}
                <div class="row">
                  {{-- Nwe arrival Product --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="new_arrival"
                        >New Arrival
                      </label>
                        <select
                        class="custom-select tm-select-accounts"
                        id="nwe_arrival"
                        name= "new_arrival"
                        >
                        <option value="1" {{$product->new_arrival == true ? 'selected' : ''}}>Nwe Arrival</option>
                        <option value="0" {{$product->new_arrival == false ? 'selected' : ''}}>Not A Nwe Arrival</option>
                      </select>
                      @error('new_arrival')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                  {{-- Top seller --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="top_seller"
                        >Top Seller
                      </label>
                      <select
                        class="custom-select tm-select-accounts"
                        id="top_seller"
                        name= "top_seller"
                      >
                        <option selected value="0" {{$product->top_seller == false ? 'selected' : ''}}>Not A Top Seller</option>
                        <option value="1" {{$product->top_seller == true ? 'selected' : ''}}>Top Seller</option>
                      </select>
                      @error('top_seller')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                  </div>
  
  

                                     {{-- Product Category --}}
                    <div class="form-group mb-3">
                      <label
                        for="category"
                        >Category</label
                      >
                      @php
                        $categories = \App\Models\Category::all();
                        $productBrands = \App\Models\ProductBrand::all();
                      @endphp
                      <select
                        class="custom-select tm-select-accounts"
                        id="category_id"
                        name="category_id"
                      >
                        <option>Select category</option>
                        <option selected value="{{$product->category->id}}">{{$product->category->name}}</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>

                   {{-- Product Brand --}}
                    <div class="form-group mb-3">
                      <label
                        for="product_brand"
                        >Brand</label
                      >
                      <select
                        class="custom-select tm-select-accounts"
                        id="product_brand_id"
                        name="product_brand_id"
                      >
                      
                      <option >Select Brand</option>
                      <option selected value="{{$product->product_brand->id}}">{{$product->product_brand->name}}</option>
                        @foreach ($productBrands as $brand)
                        <option value="{{$brand->id}}" name= "product_brand" >{{$brand->name}} </option>
                        @endforeach
                      </select>
                      @error('product_brand_id')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>

                {{-- procssor and storage --}}
                <div class="row">
                  {{-- Memory --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="processor"
                        >Processor
                      </label>
                      <input
                        id="processor"
                        name="processor"
                        type="text"
                        value="{{old('processor', $product->processor)}}"
                        class="form-control validate"
                      />
                      @error('processor')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                  {{-- Storage --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="storage"
                        >Storage
                      </label>
                      <input
                        id="storage"
                        name="storage"
                        type="text"
                        value="{{old('storage', $product->storage)}}"
                        class="form-control validate"
                      />@error('storage')
                      <p class="error" >{{ $message }}</p>
                          
                      @enderror 
                    </div>

                </div>
                {{-- ram and screen size --}}
                <div class="row">
                  {{-- Memory --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="ram"
                        >RAM
                      </label>
                      <input
                        id="ram"
                        name="ram"
                        type="text"
                        value="{{old('ram', $product->ram)}}"
                        class="form-control validate"
                      />
                      @error('ram')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                  {{-- Storage --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="screen_size"
                        >Screen Size
                      </label>
                      <input
                        id="screen_size"
                        name="screen_size"
                        type="text"
                        value="{{old('screen_size', $product->screen_size)}}"
                        class="form-control validate"
                      />@error('screen_size')
                      <p class="error" >{{ $message }}</p>
                          
                      @enderror 
                    </div>

                </div>

                {{-- graphics and display --}}
                <div class="row">
                   {{-- graphics --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="graphics"
                        >Graphics
                      </label>
                      <input
                        id="graphics"
                        name="graphics"
                        type="text"
                        value="{{old('graphics' , $product->graphics)}}"
                        class="form-control validate"
                      />
                      @error('graphics')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>

                  {{-- display --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="display"
                        >Display
                      </label>
                      <input
                        id="display"
                        name="display"
                        type="text"
                        value="{{old('display', $product->display)}}"
                        class="form-control validate"
                      />
                      @error('display')
                       <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                 

                </div>

                {{-- battery and opreation_system --}}
                <div class="row">
                  {{-- Battery --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="battery"
                        >Battery
                      </label>
                      <input
                        id="battery"
                        name="battery"
                        type="text"
                        value="{{old('battery' , $product->battery)}}"
                        class="form-control validate"
                      />
                      @error('battery')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                  {{-- Operation System --}}
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                        for="opreation_system"
                        >Operation System
                      </label>
                      <select
                        class="custom-select tm-select-accounts"
                        id="category"
                        value="{{old('opreation_system')}}"
                        name="opreation_system"
                      >
                        <option>Select OS</option>
                        <option selected>{{$product->opreation_system}}</option>
                        <option value="Windows">Windows</option>
                        <option value="Linux">Linux</option>
                        <option value="Apple">Apple</option>
                        <option value="Android">Android</option>
                        <option value="IOS">IOS</option>
                      </select>
                      @error('opreation_system')
                      <p class="error">{{ $message }}</p>
                          
                      @enderror   
                    </div>
                </div>


                {{-- Product Brand --}}
                    <div class="form-group mb-3">
                      <label
                        for="warranty"
                        >Warranty</label
                      >
                      <select
                        class="custom-select tm-select-accounts"
                        id="warranty"
                        name="warranty"
                        value="{{old('warranty', )}}"
                      >
                        <option >Select Warranty</option>
                        <option selected>{{$product->warranty}}</option>
                        <option value="1 Year" name= "warranty" >1 Year</option>
                        <option value="2 Year" name= "warranty" >2 Year</option>
                        <option value="3 Year" name= "warranty" >3 Year</option>
                        <option value="4 Year" name= "warranty" >4 Year</option>
                        <option value="5 Year" name= "warranty" >5 Year</option>
                      </select>
                      @error('warranty')
                       <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                  {{-- Port and Connection --}}
                  <div class="form-group mb-3">
                      <label
                        for="ports_and_connections"
                        >Port and Connection</label
                      >
                      <textarea                    
                        class="form-control validate tm-small"
                        id="ports_and_connections"
                        name="ports_and_connections"
                        rows="5"
                        required
                      >{{old('ports_and_connections', $product->ports_and_connections)}}</textarea>

                      @error('ports_and_connections')
                       <p class="error">{{ $message }}</p>
                          
                      @enderror
                    </div>
                  
                 
                </div>


             <div class="col-12">
               {{-- Product Description --}}
                  <div class="form-group mb-3">
                      <label
                        for="description"
                        >Description</label
                      >
                      <textarea                    
                        class="form-control validate tm-small"
                        id="description"
                        name="description"
                        rows="5"
                        required
                      >{{old('description', $product->description)}}</textarea>
                    </div>
                       @error('description')
                      <p class="error">{{ $message }}</p>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Product Now</button>
              </div>

            </form>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
</x-adminLayout>