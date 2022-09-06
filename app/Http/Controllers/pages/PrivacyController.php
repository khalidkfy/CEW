<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Privacy;
use App\Models\Setting;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function privacy()
    {
        $privacies = Privacy::all();
        $setting = Setting::query()->first();
        $certifications = Certification::query()->where('type', 'Footer')->get();

        return view('pages.privacy_page.privacy', compact('privacies', 'setting', 'certifications'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privacies = Privacy::orderBy('created_at', 'asc')->get();

        return view('pages.privacy_page.index', compact('privacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.privacy_page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        Privacy::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('privacy.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $privacy = Privacy::query()->findOrFail($id);
        return view('pages.privacy_page.edit', compact('privacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $privacy = Privacy::query()->findOrFail($id);

        $privacy->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('privacy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privacy = Privacy::query()->findOrFail($id);

        $privacy->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
