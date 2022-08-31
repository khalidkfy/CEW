<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\MPWhoWeAre;
use Illuminate\Http\Request;

class WhoAreWeController extends Controller
{
    public function edit($id)
    {
        $who_are_we = MPWhoWeAre::query()->findOrFail($id);
        return view('pages.main_page.who_are_we.edit', compact('who_are_we'));
    }

    public function update(Request $request, $id)
    {
        $who_are_we = MPWhoWeAre::query()->findOrFail($id);

        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'button_action' => ['required'],
            'button_text' => ['required'],
        ]);

        $image = null;

        if($request->hasFile('image')){
            $file = $request->file('image');

            $image = $file->store('/who_are_we', [
                'disk' => 'public'
            ]);
        }else {
            $image = $who_are_we->image;
        }

        $who_are_we->update([
            'title' => $request->title,
            'description' => $request->description,
            'button_action' => $request->button_action,
            'button_text' => $request->button_text,
            'button_active' => $request->button_active,
            'image' => $image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->back();

    }
}
