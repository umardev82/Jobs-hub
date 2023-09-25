<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company\Company;
use Illuminate\Support\Facades\Hash;
use App\Models\Company\CompanyVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
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
    $data = $request->all();
    $createCompany = $this->create($data);

    $token = Str::random(64);

    CompanyVerify::create([
          'company_id' => $createCompany->id,
          'token' => $token
        ]);

    if (config('app.email_config'))
    Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Email Verification Mail');
      });

    return redirect()->route('Company.dashboard')->withSuccess('Great! You have Successfully loggedin');
}
public function create(array $data)
{
  return Company::create([
    'name' => $data['name'],
    'email' => $data['email'],
    'password' => Hash::make($data['password'])
  ]);
}




}




