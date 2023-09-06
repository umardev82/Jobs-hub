<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Company;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $company= Company::all();
        return view('admin.company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = new Company();
        $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('company/images'), $imageName);
        $company->email = $request->email;
        $company->name = $request->name;
        $company->about = $request->about;
        $company->details = $request->details;
        $company->logo = 'company/images/'.$imageName;
        $company->password = Hash::make('yourpassword');
        $company->save();
        return redirect()->route('admin.company.index');

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
        $company = Company::find($id);
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

   /* $company = Company::find($id);
    $company = new Company();
    $imageName = time().'.'.$request->logo->extension();
    $request->logo->move(public_path('company/images'), $imageName);
    $company->email = $request->email;
    $company->name = $request->name;
    $company->about = $request->about;
    $company->details = $request->details;
    $company->logo = 'company/images/'.$imageName;
    $company->password = Hash::make('yourpassword');
    $company->save();
    return redirect()->route('admin.company.index');
    */


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $company=Company::find($id);
        $company->delete();
        return redirect()->route('admin.company.index');

    }
}
