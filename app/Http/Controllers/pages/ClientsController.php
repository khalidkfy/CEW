<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Client;
use App\Models\ClientSlider;
use App\Models\Setting;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $client = Client::query()->first();
        $setting = Setting::query()->first();
        $images = ClientSlider::all();

        $certifications = Certification::query()->where('type', 'Footer')->get();

        return view('pages.client.index', compact('client', 'setting', 'certifications', 'images'));
    }


    public function edit($id)
    {
        $client = Client::query()->first();
        return view('pages.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::query()->findOrFail($id);

        $request->validate([
            'title' => ['required'],
        ]);

        $header_image = $client->header_image;

        $array_of_images = $client->images;

        $image_path = null;

        if ($request->hasFile('header_image')) {
            $file = $request->file('header_image');
            $header_image = $file->store('/client', [
                'disk' => 'public'
            ]);
        } else {
            $header_image = $client->header_image;
        }

        if ($request->hasFile('images')) {
            $files = $request->file('images');

            foreach ($files as $file) {
                $image_path = $file->store('/client', [
                    'disk' => 'public',
                ]);

                $new_image = array_push($array_of_images, $image_path);
            }
        } else {
            $image_path = null;
        }

        $client->update([
            'title' => $request->title,
            'header_image' => $header_image,
            'images' => $array_of_images,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->back();
    }


    public function SliderImage()
    {
        $images = ClientSlider::all();

        return view('pages.client.slider.index', compact('images'));
    }

    public function SliderImageStore(Request $request)
    {
        $image = null;

        if($request->hasFile('slider_image')){
            $file = $request->file('slider_image');

            $image = $file->store('client/slider', [
                'disk' => 'public'
            ]);
        }

        ClientSlider::create([
            'image' => $image,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->back();
    }

    public function SliderImageDelete($id)
    {
        $image = ClientSlider::query()->findOrFail($id);

        $image->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
