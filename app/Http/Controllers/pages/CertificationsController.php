<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationsController extends Controller
{
    public function index()
    {
        $certifications = Certification::where('type', 'Services')->get();

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
            'type' => 'Services'
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

    public function aboutCertification()
    {
        $certifications = Certification::query()->where('type', 'About')->get();

        return view('pages.about.certification.index', compact('certifications'));
    }

    public function aboutCreateCertification()
    {
        return view('pages.about.certification.create');
    }

    public function aboutCertificationStore(Request $request)
    {

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/certification/products', [
                'disk' => 'public'
            ]);
        }else{
            $image = null;
        }

        Certification::create([
            'image' => $image,
            'type' => 'About'
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('certification.aboutCertification');
    }

    public function aboutEditCertification($id)
    {
        $certification = Certification::query()->findOrFail($id);

        return view('pages.about.certification.edit', compact('certification'));
    }

    public function aboutUpdateCertification(Request $request, $id)
    {
        $certification = Certification::query()->findOrFail($id);

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/certification/products', [
                'disk' => 'public'
            ]);
        }else{
            $image = $certification->image;
        }

        $certification->update([
            'image' => $image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('certification.aboutCertification');
    }

    public function aboutDestroyCertification($id)
    {
        $certification = Certification::query()->findOrFail($id);

        $certification->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }

    public function footerCertification()
    {
        $certifications = Certification::query()->where('type', 'Footer')->get();

        return view('pages.footer.certification.index', compact('certifications'));
    }

    public function footerCreateCertification()
    {
        return view('pages.footer.certification.create');
    }

    public function footerCertificationStore(Request $request)
    {

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/certification/footer', [
                'disk' => 'public'
            ]);
        }else{
            $image = null;
        }

        Certification::create([
            'image' => $image,
            'type' => 'Footer',
        ]);

        toastr()->success('Successfully Created');

        return redirect()->route('certification.footerCertification');
    }

    public function footerEditCertification($id)
    {
        $certification = Certification::query()->findOrFail($id);

        return view('pages.footer.certification.edit', compact('certification'));
    }

    public function footerUpdateCertification(Request $request, $id)
    {
        $certification = Certification::query()->findOrFail($id);

        $image = null;

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->store('/certification/footer', [
                'disk' => 'public'
            ]);
        }else{
            $image = $certification->image;
        }

        $certification->update([
            'image' => $image,
        ]);

        toastr()->success('Successfully Updated');

        return redirect()->route('certification.footerCertification');
    }

    public function footerDestroyCertification($id)
    {
        $certification = Certification::query()->findOrFail($id);

        $certification->delete();

        toastr()->success('Successfully Deleted');

        return redirect()->back();
    }
}
