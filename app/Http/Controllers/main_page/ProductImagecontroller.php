<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\AlbumImage;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImagecontroller extends Controller
{
    public function show($id)
    {
        $product = Product::query()->findOrFail($id);

        $product_images = ProductImage::query()->where('product_id', $product->id)->get();

        return view('pages.main_page.product.product_image.show', compact('product_images', 'product'));
    }

    public function store(Request $request)
    {
        $image = null;

        if($request->hasFile('image')){
            $file = $request->file('image');

            $image = $file->store('product', [
                'disk' => 'public',
            ]);
        }

        ProductImage::create([
            'image' => $image,
            'product_id' => $request->product_id,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $image = ProductImage::query()->findOrFail($id);

        $image->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
