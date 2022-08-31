<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPage;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductsPageController extends Controller
{
    public function index()
    {
        $product_page = ProductPage::query()->first();

        $products = Product::query()->limit(6)->get();

        $categoriesWithParents = Category::whereNull('parent_id')->limit(2)->get();
        $categories = Category::whereNotNull('parent_id')->limit(3)->get();
        $setting = Setting::query()->first();

        return view('pages.products_page.index', compact('product_page', 'products', 'categoriesWithParents', 'categories', 'setting'));

    }

    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);

        return view('pages.products_page.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
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
}
