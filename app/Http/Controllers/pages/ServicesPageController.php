<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Service;
use App\Models\ServicesPage;
use App\Models\Setting;
use Illuminate\Http\Request;

class ServicesPageController extends Controller
{
    public function index()
    {
        $services_page = ServicesPage::query()->first();

        $services = Service::query()->limit(8)->get();

        $certifications = Certification::all();
        $setting = Setting::query()->first();

        return view('pages.services_page.index', compact('services_page','services', 'certifications', 'setting'));
    }

    public function edit($id)
    {
        $service = ServicesPage::query()->findOrFail($id);

        return view('pages.services_page.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        $service = ServicesPage::query()->findOrFail($id);

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/services_page', [
                'disk' => 'public'
            ]);
        }else{
            $image = $service->image;
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->back();
    }

}
