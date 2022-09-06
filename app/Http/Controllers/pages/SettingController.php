<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit($id)
    {
        $setting = Setting::query()->first();

        return view('pages.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {

        $setting = Setting::query()->first();

        $request->validate([
            'email_address' => ['required'],
            'fax_address' => ['required'],
            'phone_number' => ['required'],
            'facebook_address' => ['required'],
            'twitter_address' => ['required'],
            'footer_description' => ['required'],
            'contact_us_description' => ['required'],
            'contact_us_title' => ['required'],
        ]);

        $header_image = $setting->header_image;
        $footer_image = $setting->footerr_image;

        if($request->hasFile('header_image')) {
            $file = $request->file('header_image');

            $header_image = $file->store('/setting', [
                'disk' => 'public',
            ]);
        }else{
            $header_image = $setting->header_image;
        }

        if($request->hasFile('footer_image')) {
            $file = $request->file('footer_image');

            $footer_image = $file->store('/setting', [
                'disk' => 'public',
            ]);
        }else{
            $footer_image = $setting->header_image;
        }

        $image_path = null;


        $setting->update([
            'email_address' => $request->email_address,
            'fax_address' => $request->fax_address,
            'phone_number' => $request->phone_number,
            'facebook_address' => $request->facebook_address,
            'twitter_address' => $request->twitter_address,
            'footer_description' => $request->footer_description,
            'header_image' => $header_image,
            'footer_image' => $footer_image,
            'contact_us_description' => $request->contact_us_description,
            'contact_us_title' => $request->contact_us_title,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->back();
    }
}
