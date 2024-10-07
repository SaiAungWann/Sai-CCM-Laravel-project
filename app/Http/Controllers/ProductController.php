<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductBrand;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::with('products')->get();
        // \dd($category);
        // $category = Category::all()->load("products");
        $topSellingProductsOne = $category->find(1)->products()->where('top_seller', true)->take(3)->get();
        $topSellingProductsTwo = $category->find(2)->products()->where('top_seller', true)->take(3)->get();
        $topSellingProductsThree = $category->find(3)->products()->where('top_seller', true)->take(3)->get();
        return view('home', [
            "products" => Product::orderBy("id", "desc")->get()->load("category", "product_brand", "product_images"),
            "newArrivalProducts" => Product::all()->where("new_arrival", "LIKE", true)->load("category", "product_brand", "product_images"),
            "categories" => $category,
            'productBrands' => ProductBrand::all(),
            'topSellingProducts' => Product::where('top_seller', true)->get()->load('category', "product_brand", "product_images"),
            'topSellingProductsOne' => $topSellingProductsOne,
            'topSellingProductsTwo' => $topSellingProductsTwo,
            'topSellingProductsThree' => $topSellingProductsThree,
        ]);
    }
    public function show(Product $product)
    {
        $product_colors = $product->load("product_colors")->product_colors;
        return view('product-details', [
            'product' => $product->load("category", 'product_brand', 'product_images'),
            'product_colors' => $product_colors
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
            'images.*' => ['required', 'max:2048'],
            'description' => 'required',
            'new_arrival' => 'required',
            'top_seller' => 'required',
            'processor' => 'required',
            'screen_size' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'graphics' => 'required',
            'display' => 'required',
            'battery' => 'required',
            'opreation_system' => 'required',
            'ports_and_connections' => 'required',
            'warranty' => 'required',
        ]);
        $images = request('images');
        // \dd($images);

        $product = new Product();

        $product->name = request('name');
        $product->product_brand_id = request('product_brand_id');
        $product->category_id = request('category_id');
        $product->price = request('price');
        $product->discounted_percentage = request('discounted_percentage');
        $product->slug = request('slug');
        $product->description = request('description');
        $product->new_arrival = request('new_arrival');
        $product->top_seller = request('top_seller');
        $product->processor = request('processor');
        $product->screen_size = request('screen_size');
        $product->ram = request('ram');
        $product->storage = request('storage');
        $product->graphics = request('graphics');
        $product->display = request('display');
        $product->battery = request('battery');
        $product->opreation_system = request('opreation_system');
        $product->warranty = request('warranty');
        $product->ports_and_connections = request('ports_and_connections');
        $product->save();

        // $product_images = new ProductImage();
        // \dd($images);
        foreach ($images as $image) {
            // \dd($image);
            $product_images = new ProductImage();
            $product_images->product_image = '/storage/' . $image->storeAs('products', time() .  "_" . $image->getClientOriginalName());

            $product_images->product_id = $product->id;
            $product_images->save();
        }
        $product_images->save();

        // $product_images->product_image = '/storage/' . $image->storeAs('products', time() .  "_" . $image->getClientOriginalName());
        // $product_images->product_id = $product->id;
        // $product_images->save();
        return redirect('admin/products');
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Edit a product
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    /******  2c24ab53-e4a3-40f2-b269-9ff8237940af  *******/
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
            'description' => 'required',
            'new_arrival' => 'required',
            'top_seller' => 'required',
            'processor' => 'required',
            'screen_size' => 'required',
            'ram' => 'required',
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
            $product_images = new ProductImage();
            $product_images->product_image = '/storage/' . $image->storeAs('products', $image->getClientOriginalName());
            $product_images->product_id = $product->id;
            $product_images->save();
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
        $product->processor = request('processor');
        $product->screen_size = request('screen_size');
        $product->ram = request('ram');
        $product->storage = request('storage');
        $product->graphics = request('graphics');
        $product->display = request('display');
        $product->battery = request('battery');
        $product->opreation_system = request('opreation_system');
        $product->warranty = request('warranty');
        $product->ports_and_connections = request('ports_and_connections');
        $product->update();

        return redirect('/admin/products');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
