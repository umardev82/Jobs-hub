<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company\CompanyVerify;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function index()
{
  return view('auth.Company.login');
}


public function __construct()
{
    $this->middleware('guest')->except('logout');
    $this->middleware('guest:company')->except('logout');
}

public function LoginCompany(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            return redirect()->route('Company.dashboard');
        }

        return back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'These credentials do not match our records.']);

    }

    public function verifyAccount($token)
{
    $verifyCompany = CompanyVerify::where('token', $token)->first();

    $message = 'Sorry, your email cannot be identified.';

    if (!is_null($verifyCompany)) {
        $company = $verifyCompany->company; // Assuming there's a 'company' relationship in the CompanyVerify model
        $company = $verifyCompany->company; // Assuming there's a 'user' relationship in the CompanyVerify model

        if (!$company->is_email_verified) {
            $company->is_email_verified = 1;
            $company->save();
            $message = "Your email is verified. You can now log in.";
        } else {
            $message = "Your email is already verified. You can now log in.";
        }
    }

    return redirect()->route('auth.Company.login.index')->with('message', $message);
}






}


