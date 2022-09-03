<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $services = Service::all();
        return view('pages.main_page.service.index', compact('services'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.main_page.service.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'service_name' => ['required', 'string'],
            'short_description' => ['required'],
            'button_text' => ['required'],
            'title' => ['required', 'string'],
            'description' => ['required'],
            'long_description' => ['required'],
            's_button_text' => ['required'],
            'icon' => ['nullable', 'image'],
            'header_image' => ['nullable', 'image'],
        ]);

        $icon = null;
        $header_image = null;


        if ($request->hasFile('icon')) {
            $file = $request->file('icon');

            $icon = $file->store('services/icon', [
                'disk' => 'public'
            ]);
        }else {
            $icon = null;
        }

        if ($request->hasFile('header_image')) {
            $file = $request->file('header_image');

            $header_image = $file->store('services/header_image', [
                'disk' => 'public'
            ]);
        }else {
            $header_image = null;
        }

        Service::create([
            'service_name' => $request->service_name,
            'short_description' => $request->short_description,
            'button_text' => $request->button_text,
            'button_active' => $request->button_active,
            'title' => $request->title,
            'description' => $request->description,
            'long_description' => $request->long_description,
            's_button_text' => $request->s_button_text,
            'icon' => $icon,
            'header_image' => $header_image,
        ]);

        toastr()->success('Successfully Create');

        return redirect()->route('service.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $service = Service::query()->findOrFail($id);
        $setting = Setting::query()->first();

        return view('pages.main_page.service.show', compact('service', 'setting'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $service = Service::query()->findOrFail($id);

        return view('pages.main_page.service.edit', compact('service'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $service = Service::query()->findOrFail($id);

        $request->validate([
            'service_name' => ['required', 'string'],
            'short_description' => ['required'],
            'button_text' => ['required'],
            'title' => ['required', 'string'],
            'description' => ['required'],
            'long_description' => ['required'],
            's_button_text' => ['required'],
            'icon' => ['nullable', 'image'],
            'header_image' => ['nullable', 'image'],
        ]);

        $icon = null;
        $header_image = null;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');

            $icon = $file->store('services/icon', [
                'disk' => 'public'
            ]);
        }else {
            $icon = $service->icon;
        }

        if ($request->hasFile('header_image')) {
            $file = $request->file('header_image');

            $header_image = $file->store('services/header_image', [
                'disk' => 'public'
            ]);
        }else {
            $header_image = $service->header_image;
        }


        $service->update([
            'service_name' => $request->service_name,
            'short_description' => $request->short_description,
            'button_text' => $request->button_text,
            'button_active' => $request->button_active,
            'title' => $request->title,
            'description' => $request->description,
            'long_description' => $request->long_description,
            's_button_text' => $request->s_button_text,
            'icon' => $icon,
            'header_image' => $header_image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('service.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $service = Service::query()->findOrFail($id);

        $service->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
