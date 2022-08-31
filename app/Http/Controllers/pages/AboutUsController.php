<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Certification;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_us = AboutUs::query()->first();
        $certifications = Certification::query()->limit(4)->get();
        $setting = Setting::query()->first();

        return view('pages.about.index', compact('about_us', 'certifications', 'setting'));
    }

    public function edit($id)
    {
        $about_us = AboutUs::query()->findOrFail($id);

        return view('pages.about.edit', compact('about_us'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'long_description' => ['required'],
            'certification_title' => ['required'],
        ]);

        $about_us = AboutUs::query()->findOrFail($id);

        $about_us->update([
            'title' => $request->title,
            'long_description' => $request->long_description,
            'certification_title' => $request->certification_title,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->back();
    }
}
