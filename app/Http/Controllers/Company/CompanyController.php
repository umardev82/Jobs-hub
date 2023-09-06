<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

       /* $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('company/images'), $imageName);
        $company = Company::where('id',Auth::id())->first();
        $company->email = $request->email;
        $company->title = $request->title;
        $company->about = $request->about;
        $company->details = $request->details;
        $company->logo = 'company/images/'.$imageName;
        $company->password = Hash::make('yourpassword');;
        $company->save();
        return redirect()->route('Company.company.edit');
        */

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
