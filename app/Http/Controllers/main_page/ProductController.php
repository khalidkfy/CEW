<?php

namespace App\Http\Controllers\main_page;

use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('created_at', 'asc')->get();
        $categories = Category::all();
        $certifications = Certification::query()->where('type', 'Services')->get();
        return view('pages.main_page.product.index', compact('products', 'categories', 'certifications'));
    }

    public function create()
    {
        $categories = Category::where('type', 'Category')->get();
        return view('pages.main_page.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'long_description' => ['required'],
        ]);

        $cover_image = null;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');

            $cover_image = $file->store('/product_images', [
                'disk' => 'public',
            ]);
        } else {
            $cover_image = null;
        }

        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'long_description' => $request->long_description,
            'cover_image' => $cover_image,
        ]);

        toastr()->success('Product Created Successfully');

        return redirect()->route('product.index');
    }


    public function show($id)
    {
        $product = Product::query()->findOrFail($id);
        $products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();

        $setting = Setting::query()->first();
        $certifications = Certification::query()->where('type', 'Footer')->get();
        $product_images = ProductImage::where('product_id', $product->id)->get();
        return view('pages.main_page.product.show', compact('product', 'products', 'setting', 'certifications', 'product_images'));
    }

    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);
        $categories = Category::where('type', 'Category')->get();
        $sub_categories = Category::where('type', 'Sub_Category')->get();
        return view('pages.main_page.product.edit', compact('product', 'categories', 'sub_categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'long_description' => ['required'],
        ]);

        $product = Product::query()->findOrFail($id);

        $cover_image = $product->cover_image;


        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');

            $cover_image = $file->store('/product_images', [
                'disk' => 'public',
            ]);
        } else {
            $cover_image = $product->cover_image;
        }

        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'long_description' => $request->long_description,
            'cover_image' => $cover_image,
        ]);

        toastr()->success('Product Updated Successfully');

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::query()->findOrFail($id);

        $product->delete();

        toastr()->success('Product Deleted Successfully');

        return redirect()->route('product.index');
    }

    public function getSubCategory(Request $request)
    {
        $sub_categories = Category::where('parent_id', $request->category_id)->get();
        return response()->json([
            'data' => $sub_categories,
        ]);
    }
}
