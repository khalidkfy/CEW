<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use App\Models\Setting;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function faqs()
    {
        $faqs = Faqs::all();
        $faq = Faqs::query()->first();
        $setting = Setting::query()->first();

        return view('pages.faqs.faqs', compact('faqs', 'faq', 'setting'));
    }
    public function index()
    {
        $faqs = Faqs::all();

        return view('pages.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('pages.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_title' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ]);

        Faqs::create([
            'page_title' => $request->page_title,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('faqs.index');
    }

    public function edit($id)
    {
        $faq = Faqs::query()->findOrFail($id);

        return view('pages.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faqs::query()->findOrFail($id);

        $request->validate([
            'page_title' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $faq->update([
            'page_title' => $request->page_title,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('faqs.index');
    }
}
