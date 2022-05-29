<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalaryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class,'index'])->name('dashboard');

Route::resource('employees', '\App\Http\Controllers\EmployeeController');
Route::resource('positions', '\App\Http\Controllers\PositionController');
Route::resource('attendances', '\App\Http\Controllers\AttendanceController');
Route::resource('loans', '\App\Http\Controllers\LoanController');
Route::resource('salaries', '\App\Http\Controllers\SalaryController');
Route::post('salaries/choose-employee', [SalaryController::class], 'chooseEmployee')->name('choose_employee');
