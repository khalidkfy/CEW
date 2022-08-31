<?php

namespace App\Http\Controllers\main_page;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\MPBoxHeader;
use App\Models\MPOurPartners;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OurPartnersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $our_partner = MPOurPartners::query()->first();
        return view('pages.main_page.our_partners.index', compact('our_partner'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $our_partner = MPOurPartners::query()->findOrFail($id);

        return view('pages.main_page.our_partners.edit', compact('our_partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => ['required', 'string'],
            'link_action' => ['required'],
            'link_text' => ['required', 'string'],
            'link_active' => ['required'],
        ]);

        $our_partner = MPOurPartners::query()->findOrFail($id);

        $our_partner->update([
            'text' => $request->text,
            'link_action' => $request->link_action,
            'link_text' => $request->link_text,
            'link_active' => $request->link_active,
        ]);

        toastr()->success('Updated Successfully');

        return redirect()->route('our_partners.index');
    }
    /**
     * ? Slider Image For Our Partners Section
     * @return Application|Factory|View
     */
    public function sliderImage(): View|Factory|Application
    {
        $images = Image::query()->where('imageable_type', 'App/Models/MPOurPartners')->get();
        return view('pages.main_page.our_partners.slider', compact('images'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|void
     * ? Add Slider Image For Our Partners
     */
    public function addSliderImage(Request $request)
    {
        $request->validate([
            'slider_image' => ['required', 'image']
        ]);

        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');

            $image = $file->store('/slider_image', [
                'disk' => 'public',
            ]);

            Image::create([
                'body' => $image,
                'imageable_id' => MPOurPartners::query()->first()->id,
                'imageable_type' => 'App/Models/MPOurPartners'
            ]);

            toastr()->success('Image Uploaded Successfully');

            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     * ? Delete Slider Image For Our Partners
     */
    public function deleteSliderImage($id): RedirectResponse
    {
        $image = Image::query()->findOrFail($id);

        $image->delete();

        toastr()->success('Image Deleted Successfully');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * ? Update Button Active
     */
    public function updateButtonActive(Request $request): JsonResponse
    {

        $our_partner = MPOurPartners::query()->first();

        $our_partner->update([
            'button_active' => $request->action,
        ]);

        return response()->json([
            'action' => 'Done',
        ]);
    }
}
