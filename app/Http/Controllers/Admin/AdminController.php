<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showCompanyRegistrations()
    {
        $registrations = Company::all();
        return view('admin.includes.dashboard', compact('registrations'));
    }
}
