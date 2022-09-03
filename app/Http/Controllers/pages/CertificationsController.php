<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationsController extends Controller
{
    public function index()
    {
        $certifications = Certification::all();

        return view('pages.services_page.certification.index', compact('certifications'));
    }

    public function create()
    {
        return view('pages.services_page.certification.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/certification', [
                'disk' => 'public'
            ]);
        }else{
            $image = null;
        }

        Certification::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('certification.index');
    }

    public function edit($id)
    {
        $certification = Certification::query()->findOrFail($id);

        return view('pages.services_page.certification.edit', compact('certification'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        $certification = Certification::query()->findOrFail($id);

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/certification', [
                'disk' => 'public'
            ]);
        }else{
            $image = $certification->image;
        }

        $certification->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('certification.index');
    }

    public function destroy($id)
    {
        $certification = Certification::query()->findOrFail($id);

        $certification->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
