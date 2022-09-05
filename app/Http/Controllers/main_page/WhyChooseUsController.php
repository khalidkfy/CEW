<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\MPWhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function edit($id)
    {
        $why_choose_us = MPWhyChooseUs::query()->findOrFail($id);
        return view('pages.main_page.why_choose_us.edit', compact('why_choose_us'));
    }

    public function update(Request $request, $id)
    {
        $why_choose_us = MPWhyChooseUs::query()->findOrFail($id);

        $request->validate([
            'text' => ['required'],
            'description' => ['required'],
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/why_choose_us', [
                'disk' => 'public'
            ]);
        } else {
            $image = $why_choose_us->image;
        }

        $why_choose_us->update([
            'text' => $request->text,
            'description' => $request->description,
            'image' => $image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->back();
    }
}
