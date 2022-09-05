<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Product;
use App\Models\ProductPage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsPageController extends Controller
{
    public function index()
    {
        $product_page = ProductPage::query()->first();

        $products = Product::query()->paginate(6);

        $categories = Category::whereNull('parent_id')->get();
        $setting = Setting::query()->first();
        $certifications = Certification::query()->where('type', 'Footer')->get();

        return view('pages.products_page.index', compact('product_page', 'products', 'categories', 'setting', 'certifications'));

    }

    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);

        return view('pages.products_page.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
//        dd($request);
        $product = ProductPage::query()->findOrFail($id);

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/product_page', [
                'disk' => 'public',
            ]);
        }else{
            $image = $product->image;
        }

        $product->update([
            'image' => $image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->back();
    }


    public function subCategory(Request $request)
    {
        $product = Product::query()->with('category')->where('sub_category_id', $request->category_id)->get();

        return response()->json([
            'data' => $product,
        ]);
    }

    public function category(Request $request)
    {
        $product = Product::query()->with('category')->where('category_id', $request->category_id)->get();

        return response()->json([
            'data' => $product,
        ]);
    }
}
