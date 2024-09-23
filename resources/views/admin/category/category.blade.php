<x-adminLayout>
    <div class="container mt-5">
      <div class="row tm-content-row">
        {{-- Product Categories --}}
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                 <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CATEGORY NAME</th>
                    <th scope="col">CATEGORY IMAGE</th>
                    <th scope="col" colspan="2" class="text-center">ACTION</th>
                    <th scope="col" ></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($categories as $category)
                    <td class="tm-product-name">{{$category->id}}</td>
                    <td class="tm-product-name">{{$category->name}}</td>
                     <td><img src="{{asset($category->image)}}" width="40" class="img-fluid" /></td>
                    <td class=" text-center">
                          <a  href="/admin/category/{{$category->id}}/edit" class="tm-product-delete-link">
                            <i class="far fa-edit tm-product-edit-icon text-white"></i>
                          </a>       
                    </td>
                    <td class="text-center">
                          <a >
                            <form action="/admin/category/{{$category->id}}/delete" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="tm-product-delete-link">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                              </button>
                              </form>
                          </a>
                    </td>
                  </tr>                
                  @endforeach
                </tbody>
              </table>
            </div>
            
            <!-- table container -->
            <a href="/admin/category/create" class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </a>
          </div>
        </div>
      </div>
    </div>
</x-adminLayout>