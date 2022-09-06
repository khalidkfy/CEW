<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumImage;
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

        $albums = Album::all();

        return view('pages.gallery.gallery', compact('galleries', 'gallery', 'setting', 'certifications', 'albums'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = gallery::query()->orderBy('created_at', 'asc')->get();


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
        ]);

        toastr()->success('Successfully Created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::query()->findOrFail($id);
        $albumImages = AlbumImage::where('album_id', $album->id)->get();
        $setting = Setting::query()->first();
        $certifications = Certification::query()->where('type', 'Footer')->get();

        return view('pages.gallery.show', compact('album', 'albumImages', 'setting', 'certifications'));
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
        $gallery = gallery::query()->findOrFail($id);

        $header_image =  null;
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
        ]);

        toastr()->success('Successfully Created');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = gallery::query()->findOrFail($id);

        $gallery->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
