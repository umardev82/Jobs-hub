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



/* Admin Route */
Route::group(['prefix'=>'admin','as'=>'admin.'], function() {
    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'index'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('login.auth');



    Route::middleware('auth:admin')->group(function () {
        //Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


        // Admin profile
        Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password/update', [App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('profile.password.update');

        Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('post.index');
        Route::get('/post/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('post.create');
        Route::get('/post/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('post.edit');
        Route::put('/post/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('post.update');
        Route::post('/post/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('post.store');
        Route::delete('/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('post.destroy');

        //Company
        Route::get('/company', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.index');
        // Route::get('/company/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('company.create');
        //Route::get('/company/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('company.edit');
        //Route::put('/company/update/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('company.update');
        //Route::post('/company/store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('company.store');
        Route::delete('/company/delete/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'destroy'])->name('company.destroy');
    });



});
// Admin Forget Password

Route::get('/forget-password', [App\Http\Controllers\Auth\Admin\ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [App\Http\Controllers\Auth\Admin\ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\Admin\ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [App\Http\Controllers\Auth\Admin\ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');




//Company Login/ Register//Forgot password

Route::get('/company/register', [App\Http\Controllers\Auth\Company\RegisterController::class, 'index'])->name('auth.Company.register.index');
Route::post('/company/register', [App\Http\Controllers\Auth\Company\RegisterController::class, 'Register'])->name('auth.Company.register.Register');

Route::get('/company/login', [App\Http\Controllers\Auth\Company\LoginController::class, 'index'])->name('auth.Company.login.index');
Route::post('/company/login', [App\Http\Controllers\Auth\Company\LoginController::class, 'LoginCompany'])->name('auth.Company.login.LoginCompany');
//Route::get('/logout', [App\Http\Controllers\Auth\Company\LoginController::class, 'logout'])->name('logout');
//Forgot password
Route::get('/forget-password', [App\Http\Controllers\Auth\Company\ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [App\Http\Controllers\Auth\Company\ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\Company\ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [App\Http\Controllers\Auth\Company\ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
/* Email varification Company*/

Route::get('/account/verify/{token}', [App\Http\Controllers\Auth\Company\LoginController::class,'verifyAccount'])->name('company.verify');







//End Admin

//Company
Route::middleware(['auth:company','is_verify_email'])->prefix('/company')->group(function () {
    //dashboard
    Route::get('/dashboard', [App\Http\Controllers\Company\DashboardController::class, 'index'])->name('Company.dashboard');


    // Admin profile
    Route::get('/profile', [App\Http\Controllers\Company\ProfileController::class, 'index'])->name('Company.profile');
    Route::put('/profile/update', [App\Http\Controllers\Company\ProfileController::class, 'update'])->name('Company.profile.update');
    //change password
    //Route::get('/change-password', [App\Http\Controllers\Company\ProfileController::class, 'ChangePasswordForm'])->name('Company.profile.ChangePasswordForm');
    Route::put('/profile/password/update', [App\Http\Controllers\Company\ProfileController::class, 'changePassword'])->name('Company.profile.password.update');

    //post
    //post
    Route::get('/posts', [App\Http\Controllers\Company\PostController::class, 'index'])->name('Company.post.index');
    Route::get('/post/create', [App\Http\Controllers\Company\PostController::class, 'create'])->name('Company.post.create');
    Route::get('/post/edit/{id}', [App\Http\Controllers\Company\PostController::class, 'edit'])->name('Company.post.edit');
    Route::put('/post/update/{id}', [App\Http\Controllers\Company\PostController::class, 'update'])->name('Company.post.update');
    Route::post('/post/store', [App\Http\Controllers\Company\PostController::class, 'store'])->name('Company.post.store');
    Route::get('/post/show', [App\Http\Controllers\Company\PostController::class, 'show'])->name('Company.post.show');
    Route::delete('/post/delete/{id}', [App\Http\Controllers\Company\PostController::class, 'destroy'])->name('Company.post.destroy');

    //employees
    Route::get('/employees', [App\Http\Controllers\Company\EmployeeController::class, 'index'])->name('Company.employee.index');
    Route::get('/employee/create', [App\Http\Controllers\Company\EmployeeController::class, 'create'])->name('Company.employee.create');
    Route::post('/employee/store', [App\Http\Controllers\Company\EmployeeController::class, 'store'])->name('Company.employee.store');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
