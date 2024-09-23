<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductBrand;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        return view('home', [
            "products" => Product::orderBy("id", "desc")->get()->load("category"),
            "newArrivalProducts" => Product::all()->where("new_arrival", "LIKE", true)->load("category"),
            "categories" => Category::all()->load("products"),
            'productBrands' => ProductBrand::all(),
            'topSellingProducts' => Product::where('top_seller', true)->get()->load('category'),
        ]);
    }
    public function show(Product $product)
    {
        return view('product-details', [
            'product' => $product
        ]);
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function store(Product $products)
    {
        $products = Product::where("name", "LIKE", "%" . request('search') . "%")->get();
        return view('store.store', [
            "products" => Product::with("category")->where("name", "LIKE", "%" . request('search') . "%")->get()->load("category"),
            "product" => $products
        ]);
    }
    public function search()
    {
        return view('store.store', [
            "products" => Product::filter([
                'search' => request('search'),
                'category' => request('category'),
                'product_brand' => request('product_brand'),
            ])->get()->load("category"),
            'productBrands' => ProductBrand::all()->load("products"),
            "categories" => Category::all()->load("products"),
        ]);
    }

    public function admin_product()
    {
        return view(
            'admin.productsList',
            [
                "products" => Product::latest()->get()->load("category", "product_brand"),
                'productBrands' => ProductBrand::all()->load("products"),
                "categories" => Category::all()->load("products"),
            ]
        );
    }

    public function create()
    {
        return view('admin.addProduct', [
            "products" => Product::with("category", "product_brand")->latest()->paginate(5),
        ]);
    }

    public function adminStoreProduct()
    {
        request()->validate([
            'name' => 'required',
            'product_brand_id' => 'required',
            'category_id' => 'required',
            'price' => ['required'],
            'discounted_percentage' => ['required', 'numeric', 'between:0,100'],
            'slug' => 'required',
            'image' => ['required', 'max:2048'],
            'description' => 'required',
            'new_arrival' => 'required',
            'top_seller' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'graphics' => 'required',
            'display' => 'required',
            'battery' => 'required',
            'opreation_system' => 'required',
            'ports_and_connections' => 'required',
            'warranty' => 'required',
        ]);
        $image = request('image');

        $product = new Product();

        $product->name = request('name');
        $product->product_brand_id = request('product_brand_id');
        $product->category_id = request('category_id');
        $product->price = request('price');
        $product->discounted_percentage = request('discounted_percentage');
        $product->image = '/storage/' . $image->storeAs('products', $image->getClientOriginalName());
        $product->slug = request('slug');
        $product->description = request('description');
        $product->new_arrival = request('new_arrival');
        $product->top_seller = request('top_seller');
        $product->memory = request('memory');
        $product->storage = request('storage');
        $product->graphics = request('graphics');
        $product->display = request('display');
        $product->battery = request('battery');
        $product->opreation_system = request('opreation_system');
        $product->warranty = request('warranty');
        $product->ports_and_connections = request('ports_and_connections');
        $product->save();

        return redirect('admin/productList');
    }

    public function edit(Product $product)
    {
        return view('admin.editProduct', [
            "product" => $product
        ]);
    }

    public function update(Product $product)
    {
        request()->validate([
            'name' => 'required',
            'product_brand_id' => 'required',
            'category_id' => 'required',
            'price' => ['required'],
            'discounted_percentage' => ['required', 'numeric', 'between:0,100'],
            'slug' => 'required',
            'image' => ['required', 'max:2048'],
            'description' => 'required',
            'new_arrival' => 'required',
            'top_seller' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'graphics' => 'required',
            'display' => 'required',
            'battery' => 'required',
            'opreation_system' => 'required',
            'ports_and_connections' => 'required',
            'warranty' => 'required',
        ]);

        if ($image = request('image')) {
            File::delete(public_path($product->image)); //public/
            $product->image = '/storage/' . $image->storeAs('products', $image->getClientOriginalName()); ///storage/products/3lEZECb934Jl34nviuyKgh5GaFWTtRkFdFEjgDSF.jpg
        }
        $product->name = request('name');
        $product->product_brand_id = request('product_brand_id');
        $product->category_id = request('category_id');
        $product->price = request('price');
        $product->discounted_percentage = request('discounted_percentage');

        $product->slug = request('slug');
        $product->description = request('description');
        $product->new_arrival = request('new_arrival');
        $product->top_seller = request('top_seller');
        $product->memory = request('memory');
        $product->storage = request('storage');
        $product->graphics = request('graphics');
        $product->display = request('display');
        $product->battery = request('battery');
        $product->opreation_system = request('opreation_system');
        $product->warranty = request('warranty');
        $product->ports_and_connections = request('ports_and_connections');
        $product->update();

        return redirect('admin/productsList');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
