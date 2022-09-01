<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function contact_us()
    {
        $setting = Setting::query()->first();
        return view('pages.contact_us.contact', compact('setting'));
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $contacts = ContactUs::all();
        return view('pages.contact_us.index', compact('contacts'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'max:50'],
            'subject' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'prefix_number' => ['required', 'max:3'],
            'phone_number' => ['required', 'max:10'],
            'message' => ['required'],
        ]);

        ContactUs::create([
            'full_name' => $request->full_name,
            'subject' => $request->subject,
            'email' => $request->email,
            'phone_number' => $request->prefix_number . $request->phone_number,
            'message' => $request->message,
        ]);

        toastr()->success('Sent Successfully');

        return redirect()->route('home');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $contact = ContactUs::query()->findOrFail($id);

        $contact->delete();

        toastr()->success('Message Deleted Successfully');

        return redirect()->back();
    }
}
