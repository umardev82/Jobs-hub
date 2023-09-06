<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
