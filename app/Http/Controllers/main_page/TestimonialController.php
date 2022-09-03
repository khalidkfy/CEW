<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('pages.main_page.testimonial.index', compact('testimonials'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.main_page.testimonial.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            't_content' => ['required'],
        ]);

        Testimonial::create([
            'name' => $request->name,
            'content' => $request->t_content,
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('testimonial.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        return view('pages.main_page.testimonial.edit', compact('testimonial'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //        dd($request);
        $request->validate([
            'name' => ['required'],
            't_content' => ['required'],
        ]);

        $testimonial = Testimonial::query()->findOrFail($id);

        $testimonial->update([
            'name' => $request->name,
            'content' => $request->t_content,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('testimonial.index');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::query()->findOrFail($id);

        $testimonial->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();

    }

}
