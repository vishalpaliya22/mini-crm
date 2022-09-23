<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('admin');
});

// Auth::routes();

Route::middleware(['guest', 'prevent-back-history'])->group(function () {
    //Admin Login route
    Route::get('/admin', [AdminController::class,'index'])->name('admin.login');
    Route::post('/checklogin',[AdminController::class,'adminLogin'])->name('checklogin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'prevent-back-history','check-admin']], function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    // Logout
    Route::get('/logout', [AdminController::class,'adminLogout'])->name('admin.logout');

    Route::resources([
        'employee' => EmployeeController::class,              
        'company' => CompanyController::class,                
    ]);
});

 



