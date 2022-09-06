<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->with('sub', 'products')->orderBy('created_at', 'asc')->get();

        return view('pages.main_page.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.main_page.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required'],
        ]);

        $icon = null;

        if($request->hasFile('icon')){
            $file = $request->file('icon');

            $icon = $file->store('/category/icon', [
                'disk' => 'public'
            ]);
        }else{
            $icon = null;
        }


        Category::create([
            'category_name' => $request->category_name,
            'type' => $request->type,
            'icon' => $icon,
        ]);

        toastr()->success('Category Successfully Created');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        $sub_categories = Category::where('type', 'Sub_Category')->get();

        return view('pages.main_page.categories.edit', compact('category', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['required'],
        ]);

        $category = Category::query()->findOrFail($id);

        $icon = null;

        if($request->hasFile('icon')){
            $file = $request->file('icon');

            $icon = $file->store('/category/icon', [
                'disk' => 'public'
            ]);
        }else{
            $icon = $category->icon;
        }

        $category->update([
            'category_name' => $request->category_name,
            'icon' => $icon,
        ]);

        $set_to_null = Category::query()
            ->whereNotIn('category_name', $request->sub_category)
            ->where('type', 'Sub_Category')
            ->where('parent_id', $category->id)
            ->get();
        foreach($request->sub_category as $sub_category){
            $update_sub_category = Category::where('category_name', $sub_category)->first();
            $update_sub_category->update([
               'parent_id' => $category->id,
            ]);

        }
        foreach ($set_to_null as $null) {
            $null->update([
                'parent_id' => null,
            ]);
        }

        toastr()->success('Category Successfully Updated');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::query()->findOrFail($id);

        $products = Product::where('category_id', $category->id)->get();

        foreach ($products as $product){
            $product->delete();
        }

        $category->delete();

        toastr()->success('Category Successfully Deleted');

        return redirect()->route('category.index');
    }
}
