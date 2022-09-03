<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountSettingsController extends Controller
{
    public function edit($id)
    {
        $user = User::query()->findOrFail($id);

        return view('pages.account_setting.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);

        $request->validate([
            'full_name' => ['required'],
            'email' => ['required'],
            'old_password' => ['nullable'],
            'new_password' => ['nullable'],
            'confirm_password' => ['nullable'],
        ]);

        $image = null;

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $image = $file->store('/account_setting/avatar', [
                'disk' => 'public'
            ]);
        }else{
            $image = $user->avatar;
        }

        if($request->old_password) {

            if(Hash::check($request->old_password, $user->password)) {
                if ($request->new_password === $request->confirm_password) {
                    $user->update([
                        'name' => $request->full_name,
                        'email' => $request->email,
                        'password' => Hash::make($request->new_password),
                        'avatar' => $image,
                    ]);

                    toastr()->success('Successfully Updated');
                    return redirect()->back();

                }else{
                    toastr()->error('New Password Not Confirm With Confirm Password');
                    return redirect()->back();
                }
            } else {
                toastr()->error('Old Password In Not Correct');
                return redirect()->back();
            }
        }else{
            $user->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'avatar' => $image,
            ]);

            toastr()->success('Successfully Updated');
            return redirect()->back();
        }

    }

}
