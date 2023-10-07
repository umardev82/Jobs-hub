<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::where('id', Auth::id())->first();
        return view('admin.profile.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {
        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('admin/images'), $imageName);
        $admin = Admin::where('id', Auth::id())->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->logo = 'admin/images/' . $imageName;
        $admin->Save();
        return redirect()->route('admin.profile')->with('success', 'Profile Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function ChangePasswordForm()
    {
        return view('admin.profile.change_password');
    }

    public function changePassword(UpdatePasswordRequest $request)
    {
        $input = $request->all();
        $admin = Admin::where('id', Auth::id())->first();

        if (!Hash::check($input['old_password'], $admin->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        } else {
            // Update the user's password
            $admin->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('admin.profile')->with('success', 'Password Update successfully.');
        }
    }
}
