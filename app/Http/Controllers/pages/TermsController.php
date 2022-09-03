<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Term;
use Illuminate\Http\Request;

class TermsController extends Controller
{

    public function terms()
    {
        $terms = Term::all();
        $setting = Setting::query()->first();

        return view('pages.terms_page.terms', compact('terms', 'setting'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::all();

        return view('pages.terms_page.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.terms_page.create');
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

        Term::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('term.index');
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

        $term = Term::query()->findOrFail($id);
        return view('pages.terms_page.edit', compact('term'));
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

        $term = Term::query()->findOrFail($id);

        $term->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('term.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Term::query()->findOrFail($id);

        $term->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
