<?php

namespace App\Http\Controllers;

use App\Models\ProductBrand;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{

    public function index()
    {
        $brands = ProductBrand::where("name", "LIKE", "%" . request('search') . "%")->get();
        return view('admin.brands.brands', [
            "brands" => $brands
        ]);
    }


    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            'image' => ['required', 'max:2048'],
            'slug' => 'required',
        ]);
        $image = request('image');
        $brand = new ProductBrand();
        $brand->name = $request->name;
        $brand->slug = $request->slug;

        $brand->image = '/storage/' . $image->storeAs('brands', $image->getClientOriginalName());
        $brand->save();

        return redirect('/admin/brands')->with('message', 'Brand Added Successfully');
    }


    public function edit(ProductBrand $brand)
    {
        return view('admin.brands.edit', [
            "brand" => $brand
        ]);
    }


    public function update(Request $request, ProductBrand $brand)
    {
        $request->validate([
            "name" => "required",
            'image' => ['required', 'max:2048'],
            'slug' => 'required',
        ]);
        $image = request('image');
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->image = '/storage/' . $image->storeAs('brands', $image->getClientOriginalName());
        $brand->update();
        return redirect('/admin/brands')->with('message', 'Brand Updated Successfully');
    }


    public function destroy(ProductBrand $brand)
    {
        $brand->delete();
        return redirect('/admin/brands')->with('message', 'Brand Deleted Successfully');
    }
}
