<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Company\Company;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
     $company = Auth::guard('company')->user();
        return view('Company.profile.edit',compact('company'));
    }



    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {

        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('company/images'), $imageName);

        $company = Auth::guard('company')->user();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->about = $request->about;
        $company->details = $request->details;
        $company->logo = 'company/images/' . $imageName;
        $company->Save();
        return redirect()->route('Company.profile')->with('success', 'Profile Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function ChangePasswordForm()
    {
        return view('Company.profile.change_password');
    }

    public function changePassword(UpdatePasswordRequest  $request)
    {


        $input = $request->all();
        $company = Auth::guard('company')->user();

        if (!Hash::check($input['old_password'], $company->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        } else {
            // Update the user's password
            $company->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('Company.profile')->with('success', 'Password Update successfully.');
        }
    }

}
