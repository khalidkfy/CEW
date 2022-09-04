<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $certifications = Certification::query()->where('type', 'Services')->get();
        return view('pages.main_page.product.index', compact('products', 'categories', 'certifications'));
    }

    public function create()
    {
        $categories = Category::all();
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

        $image_path = null;

        $images = [];

        if ($request->hasFile('images')) {
            $files = $request->file('images');

            foreach ($files as $file) {
                $image_path = $file->store('/product_images', [
                    'disk' => 'public',
                ]);

                $images[] = $image_path;
            }
        } else {
            $image_path = null;
        }

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
            'images' => $images,
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
        return view('pages.main_page.product.show', compact('product', 'products', 'setting', 'certifications'));
    }

    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);
        $categories = Category::where('type', 'Category')->get();
        return view('pages.main_page.product.edit', compact('product', 'categories'));
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

        $array_of_images = $product->images;

        $cover_image = $product->cover_image;

        $image_path = null;

        if ($request->hasFile('images')) {
            $files = $request->file('images');

            foreach ($files as $file) {
                $image_path = $file->store('/product_images', [
                    'disk' => 'public',
                ]);

                $new_image = array_push($array_of_images, $image_path);
            }
        } else {
            $image_path = null;
        }

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
            'images' => $array_of_images,
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
