<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\gallery;
use App\Models\Setting;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $galleries = gallery::all();
        $gallery = gallery::query()->first();
        $setting = Setting::query()->first();
        $certifications = Certification::query()->where('type', 'Footer')->get();

        return view('pages.gallery.gallery', compact('galleries', 'gallery', 'setting', 'certifications'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = gallery::all();

        return view('pages.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.gallery.create');
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
            'title' => ['required'],
            'description' => ['required'],
            'gallery_title' => ['required'],
        ]);

        $image_path = null;

        $cover_text = null;

        //        $header_image = null;

        $galleries = [];

        if ($request->hasFile('gallery')) {
            $files = $request->file('gallery');

            foreach ($files as $file) {
                $image_path = $file->store('/gallery', [
                    'disk' => 'public',
                ]);

                $galleries[] = $image_path;
            }
        } else {
            $image_path = null;
        }

        //        if($request->hasFile('cover_text')) {
        //            $file = $request->file('cover_text');
        //
        //            $cover_text = $file->store('/gallery', [
        //                'disk' => 'public',
        //            ]);
        //        }

        if ($request->hasFile('cover_text')) {
            $file = $request->file('cover_text');

            $cover_text = $file->store('/gallery', [
                'disk' => 'public',
            ]);
        }

        gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'header_image' => asset('storage') . '/' . 'gallery/header_image',
            'gallery_title' => $request->gallery_title,
            'galleries' => $galleries,
            'cover_text' => $cover_text,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = gallery::query()->findOrFail($id);
        $setting = Setting::query()->first();
        $certifications = Certification::query()->where('type', 'Footer')->get();

        return view('pages.gallery.show', compact('gallery', 'setting', 'certifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = gallery::query()->findOrFail($id);
        return view('pages.gallery.edit', compact('gallery'));
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
//        dd($request);
        $gallery = gallery::query()->findOrFail($id);

        $array_of_images = $gallery->galleries;

        $image_path = null;

        if ($request->hasFile('gallery')) {
            $files = $request->file('gallery');

            foreach ($files as $file) {
                $image_path = $file->store('/gallery', [
                    'disk' => 'public',
                ]);

                $new_image = array_push($array_of_images, $image_path);
            }
        } else {
            $image_path = null;
        }

        $cover_text = null;

        $header_image =  null;

        if ($request->hasFile('cover_text')) {
            $file = $request->file('cover_text');

            $cover_text = $file->store('/gallery', [
                'disk' => 'public',
            ]);
        } else {
            $cover_text = $gallery->cover_text;
        }

        if ($request->hasFile('header_image')) {
            $file = $request->file('header_image');

            $header_image = $file->store('/gallery', [
                'disk' => 'public',
            ]);
        } else {
            $header_image =  $gallery->header_image;
        }

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'header_image' => $header_image,
            'gallery_title' => $request->gallery_title,
            'galleries' => $array_of_images,
            'cover_text' => $cover_text,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
