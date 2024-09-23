<x-adminLayout>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT IMAGE</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">DISCOUNT %</th>
                    <th scope="col">UNIT SOLD</th>
                    <th scope="col">IN STOCK</th>
                    <th scope="col">EXPIRE DATE</th>
                    <th scope="col" colspan="2" class="text-center">ACTION</th>
                    <th scope="col" colspan=""></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr herf="/admin/product/{{$product->id}}/edit">
                      <td class="tm-product-name">{{$product->id}}</td>
                      <td class="tm-product-name">{{$product->name}}</td>
                      <td><img src="{{asset($product->image)}}" width="40" class="img-fluid" /></td>
                      <td>$ {{$product->price}}</td>
                      <td>$ {{$product->discounted_percentage}}</td>
                      <td>1,450 Eg.</td>
                      <td>550 Eg.</td>
                      <td>28 March 2019 Eg.</td>
                      <td class=" text-center">
                        <a href="/admin/product/{{$product->id}}/edit" class="tm-product-delete-link">
                          <i class="far fa-edit tm-product-edit-icon text-white"></i>
                        </a>
                        </td>
                        <td class="text-center">
                          <a>
                            <form action="/admin/product/{{$product->id}}/delete" method="post">
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
            <a
              href="/admin/product/create"
              class="btn btn-primary btn-block text-uppercase mb-3 ">Add new product</a>
          </div>
        </div>

      </div>
    </div>
</x-adminLayout>