<?php

use Illuminate\Support\Facades\Route;
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

\Illuminate\Support\Facades\Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('welcome');
});


//Client Controller

Route::get('homes',[\App\Http\Controllers\ClientController::class,'home'])->name('con.homes');
Route::get('about',[\App\Http\Controllers\ClientController::class,'about']);
Route::get('services',[\App\Http\Controllers\ClientController::class,'services']);

//client authentication

Route::get('logins',[\App\Http\Controllers\ClientController::class,'login'])->name('auth.login');
Route::get('registers',[\App\Http\Controllers\ClientController::class,'register'])->name('auth.register');
Route::post('make',[\App\Http\Controllers\ClientController::class,'make'])->name('con.make');
Route::post('check',[\App\Http\Controllers\ClientController::class,'check'])->name('con.check');

Route::get('admin/dashboard',[\App\Http\Controllers\ClientController::class,'dashboard']);
Route::get('logout',[\App\Http\Controllers\ClientController::class,'logout'])->name('con.logout');
Route::get('profile',[\App\Http\Controllers\ClientController::class,'profile'])->name('profile');
Route::get('profileedit/{id}',[\App\Http\Controllers\ClientController::class,'profileedit'])->name('editpage');
Route::post('profileupdate',[\App\Http\Controllers\ClientController::class,'profileupdate'])->name('profile.update');
//Route::get('viewpro',[\App\Http\Controllers\ClientController::class,'viewpro']);


//forgot and reset password

Route::get('forgot',[\App\Http\Controllers\ClientController::class,'forgot']);
Route::get('reset/{email}/{remember_token}',[\App\Http\Controllers\ClientController::class,'reset'])->name('reset');
Route::post('forgot',[\App\Http\Controllers\ClientController::class,'forgotpassword'])->name('forgot');
Route::post('resetpassword',[\App\Http\Controllers\ClientController::class,'resetpassword'])->name('resetpassword');


//Admin Controller

Route::get('welcome1',[\App\Http\Controllers\AdminController::class,'welcome1']);
Route::get('display',[\App\Http\Controllers\AdminController::class,'display']);
Route::get('edit/{id}',[\App\Http\Controllers\AdminController::class,'edit']);
Route::post('update',[\App\Http\Controllers\AdminController::class,'updateid'])->name('form.update');
Route::get('single/{id}',[\App\Http\Controllers\AdminController::class,'single']);
Route::get('delete/{id}',[\App\Http\Controllers\AdminController::class,'delete'])->name('delete');


// AdminAuth controller [admin authentication]

Route::get('regadmin',[\App\Http\Controllers\AdminController::class,'regadmin']);
Route::get('logadmin',[\App\Http\Controllers\AdminController::class,'loginadmin']);
Route::post('reg',[\App\Http\Controllers\AdminController::class,'save'])->name('admin.save');
Route::post('log',[\App\Http\Controllers\AdminController::class,'check'])->name('log.check');



//contact method for client

Route::get('clientcontact',[\App\Http\Controllers\ClientController::class,'contact']);
Route::post('clicontact',[\App\Http\Controllers\ClientController::class,'create'])->name('send.emailclient');
Route::get('vieww',[\App\Http\Controllers\ClientController::class,'viewcontact']);


//contact method for admin

Route::get('admincontact',[\App\Http\Controllers\AdminController::class,'contactadmin']);
Route::post('adcontact',[\App\Http\Controllers\AdminController::class,'createadmin'])->name('send.email');
