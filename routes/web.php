<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('welcome');
});


Auth::routes();


Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login-admin');
Route::get('/login/employee', [LoginController::class,'showBEmployeeLoginForm'])->name('login-employee');
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm'])->name('register-admin');
Route::get('/register/employee', [RegisterController::class,'showEmployeeRegisterForm'])->name('register-employee');

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/employee', [LoginController::class,'employeeLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/employee', [RegisterController::class,'createEmployee']);
//
//Route::group(['middleware' => 'auth:employee'], function () {
//    Route::view('/employee', 'employee');
//});
//
//Route::group(['middleware' => 'auth:admin'], function () {
//
//    Route::view('/admin', 'admin');
//});

Route::get('/employee', 'checkin_checkoutController@show_employee')->middleware('auth:employee');

Route::get('/admin', 'showEmployeeController@index')->middleware('auth:admin');

Route::get('logout', [LoginController::class,'logout']);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/ban-employee/{id}','showEmployeeController@ban_employee')->name('ban-employee');

Route::get('/permit-employee/{id}','showEmployeeController@permit_employee')->name('permit-employee');

Route::post('/checkin', 'checkin_checkoutController@checkin')->name('checkin');

Route::post('/checkout', 'checkin_checkoutController@checkout')->name('checkout');

