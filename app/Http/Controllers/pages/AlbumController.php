<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $albums = Album::all();
        return view('pages.gallery.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.gallery.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $cover_image = null;

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');

            $cover_image = $file->store('albums', [
                'disk' => 'public',
            ]);
        }

        Album::create([
            'title' => $request->title,
            'cover_image' => $cover_image,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $album = Album::query()->findOrFail($id);

        $images = AlbumImage::where('album_id', $album->id)->get();

        return view('pages.gallery.album.show', compact('album', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $album = Album::query()->findOrFail($id);

        return view('pages.gallery.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $album = Album::query()->findOrFail($id);

        $request->validate([
            'title' => ['required'],
        ]);

        $cover_image = null;

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');

            $cover_image = $file->store('albums', [
                'disk' => 'public',
            ]);
        }else{
            $cover_image = $album->cover_image;
        }

        $album->update([
            'title' => $request->title,
            'cover_image' => $cover_image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $album = Album::query()->findOrFail($id);

        $images = AlbumImage::where('album_id', $album->id)->get();

        foreach ($images as $image) {
            $image->delete();
        }

        $album->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->route('album.index');
    }
}
