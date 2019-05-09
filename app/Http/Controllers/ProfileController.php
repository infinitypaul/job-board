<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *  Update User Profile
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request){
        $user = Auth::user();
        if ($request->filled('fullname')) $user->name = $request->fullname;
        if ($request->hasFile('picture')) {
            $user->picture = $request->file('picture')->store('images', 'public');
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    /**
     *  Change Password
     * @param \App\Http\Requests\PasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(PasswordRequest $request){
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password Updated Successfully');

    }
}
