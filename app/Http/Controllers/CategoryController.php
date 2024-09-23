<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Category $category)
    {
        $categories = Category::where("name", "LIKE", "%" . request('search') . "%")->get();

        return view('category.category', [
            "category" => $category,
            "products" => Product::with("category")->where("category_id", "LIKE", $category->id)->get(),
            "categories" => $categories
        ]);
    }
    public function allCategories()
    {
        $products = Product::where("name", "LIKE", "%" . request('search') . "%")->get();


        return view('category.categoryCollections', [
            "categories" => Category::all()->load("products"),
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            'image' => ['required', 'max:2048'],
            'slug' => 'required',
        ]);
        $image = request('image');
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->image = '/storage/' . $image->storeAs('categories', $image->getClientOriginalName());
        $category->save();

        return redirect('/admin/categories')->with('message', 'Category Added Successfully');
    }

    public function adminCategory()
    {
        $categories = Category::where("name", "LIKE", "%" . request('search') . "%")->get();
        return view('admin.category.category', [
            "categories" => $categories
        ]);
    }

    public function addCategory(Category $category)
    {
        return view('admin.category.create', [
            "category" => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            "category" => $category
        ]);
    }

    public function update(Category $category)
    {
        request()->validate([
            "name" => "required",
            'image' => ['required', 'max:2048'],
            'slug' => 'required',
        ]);
        $image = request('image');

        $category->name = request('name');
        $category->slug = \request('slug');
        $category->image = '/storage/' . $image->storeAs('categories', $image->getClientOriginalName());
        $category->update();

        return redirect('/admin/categories')->with('message', 'Category Updated Successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/categories')->with('message', 'Category Deleted Successfully');
    }
}
