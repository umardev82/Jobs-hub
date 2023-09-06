<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


//Company Login/ Register

Route::get('/company/register', [App\Http\Controllers\Auth\Company\RegisterController::class, 'index'])->name('auth.Company.register.index');
Route::post('/company/register', [App\Http\Controllers\Auth\Company\RegisterController::class, 'Register'])->name('auth.Company.register.Register');

Route::get('/company/login', [App\Http\Controllers\Auth\Company\LoginController::class, 'index'])->name('auth.Company.login.index');
Route::post('/company/login', [App\Http\Controllers\Auth\Company\LoginController::class, 'LoginCompany'])->name('auth.Company.login.LoginCompany');
//Admin Login/ Register

Route::get('/admin/login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'index'])->name('auth.Admin.login.index');
Route::post('/admin/login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'LoginAdmin'])->name('auth.Admin.login.LoginAdmin');





//Admin  Panel  Routes
Route::middleware('auth:admin')->prefix('/admin')->group(function () {
    //Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


    // Admin profile
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile.edit');
    Route::put('/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
    //change password
    Route::get('/change-password', [App\Http\Controllers\Admin\ProfileController::class, 'ChangePasswordForm'])->name('admin.profile.ChangePasswordForm');
    Route::post('/change-password', [App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('admin.profile.changePassword');
    //post
    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.post.index');
    Route::get('/post/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.post.create');
    Route::get('/post/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('/post/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.post.update');
    Route::post('/post/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.post.store');
    Route::delete('/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.post.destroy');
    //Company
    Route::get('/company', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('admin.company.index');
   // Route::get('/company/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('admin.company.create');
    //Route::get('/company/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('admin.company.edit');
    //Route::put('/company/update/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('admin.company.update');
    //Route::post('/company/store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('admin.company.store');
    Route::delete('/company/delete/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'destroy'])->name('admin.company.destroy');
});


//End Admin

//Company
Route::middleware('auth:company')->prefix('/company')->group(function () {
    //dashboard
    Route::get('/dashboard', [App\Http\Controllers\Company\DashboardController::class, 'index'])->name('Company.dashboard');

    // Admin profile
    Route::get('/profile', [App\Http\Controllers\Company\ProfileController::class, 'index'])->name('Company.profile.edit');
    Route::put('/profile/update', [App\Http\Controllers\Company\ProfileController::class, 'update'])->name('Company.profile.update');
    //change password
    Route::get('/change-password', [App\Http\Controllers\Company\ProfileController::class, 'ChangePasswordForm'])->name('Company.profile.ChangePasswordForm');
    Route::post('/change-password', [App\Http\Controllers\Company\ProfileController::class, 'changePassword'])->name('Company.profile.changePassword');
    //post
    //post
    Route::get('/posts', [App\Http\Controllers\Company\PostController::class, 'index'])->name('Company.post.index');
    Route::get('/post/create', [App\Http\Controllers\Company\PostController::class, 'create'])->name('Company.post.create');
    Route::get('/post/edit/{id}', [App\Http\Controllers\Company\PostController::class, 'edit'])->name('Company.post.edit');
    Route::put('/post/update/{id}', [App\Http\Controllers\Company\PostController::class, 'update'])->name('Company.post.update');
    Route::post('/post/store', [App\Http\Controllers\Company\PostController::class, 'store'])->name('Company.post.store');
    Route::delete('/post/delete/{id}', [App\Http\Controllers\Company\PostController::class, 'destroy'])->name('Company.post.destroy');

    //employees
    Route::get('/employees', [App\Http\Controllers\Company\EmployeeController::class, 'index'])->name('Company.employee.index');
    Route::get('/employee/create', [App\Http\Controllers\Company\EmployeeController::class, 'create'])->name('Company.employee.create');
    Route::post('/employee/store', [App\Http\Controllers\Company\EmployeeController::class, 'store'])->name('Company.employee.store');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
