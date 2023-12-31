<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            'title' => " Dashboard",
            'links' => [
                ['name' => "Home", 'url' => route('Company.dashboard')],
                ['name' => " Dashboard", 'url' => route('Company.dashboard')],
            ],
        ];

        if(Auth::check()){
            return view('Company.dashboard.index',compact('breadcrumbs'));
        }

        return redirect()->route('auth.Company.login.index')->withSuccess('Opps! You do not have access');
       // return view('Company.includes.dashboard');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
