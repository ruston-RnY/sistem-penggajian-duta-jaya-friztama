<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginUser');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    
    Route::resource('employees', '\App\Http\Controllers\EmployeeController');
    Route::resource('positions', '\App\Http\Controllers\PositionController');
    Route::resource('attendances', '\App\Http\Controllers\AttendanceController');
    Route::resource('loans', '\App\Http\Controllers\LoanController');
    Route::resource('salaries', '\App\Http\Controllers\SalaryController');
    Route::post('salaries/save', [\App\Http\Controllers\SalaryController::class, 'saveSalary'])->name('save-salary');
    Route::resource('users', '\App\Http\Controllers\UserController');
});
