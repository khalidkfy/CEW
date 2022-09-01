<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Console\Application;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SalesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sales = Sale::all();
        return view('pages.sales_inquiry.index', compact('sales'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'prefix_number' => ['required', 'max:3'],
            'phone_number' => ['required', 'max:10'],
            'message' => ['required'],
        ]);

        if($request->service_id) {
            if($validator->passes()) {
                Sale::create([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'phone_number' => $request->prefix_number . $request->phone_number,
                    'message' => $request->message,
                    'service_id' => $request->service_id,
                ]);

                toastr()->success('Sent Successfully');

                return redirect()->route('home');
            }elseif ($validator->fails()) {
                toastr()->error('There Is An Error, Try Again');
                return redirect()->back()->withErrors($validator);
            }
        }

        if($request->product_id) {
            if($validator->passes()) {
                Sale::create([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'phone_number' => $request->prefix_number . $request->phone_number,
                    'message' => $request->message,
                    'service_id' => $request->product_id,
                ]);

                toastr()->success('Sent Successfully');

                return redirect()->route('home');

            }elseif ($validator->fails()) {
                toastr()->error('There Is An Error, Try Again');
                return redirect()->back()->withErrors($validator);
            }
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $sale = Sale::query()->findOrFail($id);

        $sale->delete();

        toastr()->success('Message Deleted Successfully');

        return redirect()->back();
    }
}
