<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company\Company;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

public function index()
{
  return view('auth.Company.register');
}


/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:company');
    }
protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function Register(Request $request)
{
    $this->validator($request->all())->validate();
    $company = Company::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
    ]);
    return redirect()->route('Company.dashboard')->with('Registered Successfully');

}

}


