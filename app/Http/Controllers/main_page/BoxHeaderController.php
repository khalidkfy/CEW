<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\MPBoxHeader;
use Database\Seeders\MPBoxHeaderSeeder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BoxHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $box_header = MPBoxHeader::first();
        return view('pages.main_page.box_header.index', compact('box_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $box_header = MPBoxHeader::findOrFail($id);

        return view('pages.main_page.box_header.edit', compact('box_header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'button_action' => ['required'],
            'button_text' => ['required'],
            'button_active' => ['required'],
            'image' => ['nullable', 'image']
        ]);

        $box_header = MPBoxHeader::findOrFail($id);

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/box_header_image', [
                'disk' => 'public',
            ]);
        }else{
            $image = $box_header->image;
        }

        $box_header->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'button_action' => $request->button_action,
            'button_text' => $request->button_text,
            'button_active' => $request->button_active,
            'image' => $image,
        ]);

        toastr()->success('Edited successfully');

        return redirect()->route('box_header.index');
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


    public function updateButtonActive(Request $request)
    {

        $box_header = MPBoxHeader::first();

        $box_header->update([
            'button_active' => $request->action,
        ]);

        return response()->json([
            'action' => 'Done',
        ]);
    }
}
