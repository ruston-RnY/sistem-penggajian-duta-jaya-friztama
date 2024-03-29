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
    Route::get('/search-employee', [\App\Http\Controllers\EmployeeController::class,'search'])->name('search-employee');

    Route::resource('positions', '\App\Http\Controllers\PositionController');
    Route::get('/search-position', [\App\Http\Controllers\PositionController::class,'search'])->name('search-position');

    Route::resource('attendances', '\App\Http\Controllers\AttendanceController');
    Route::get('/search-attendance', [\App\Http\Controllers\AttendanceController::class,'search'])->name('search-attendance');

    Route::resource('loans', '\App\Http\Controllers\LoanController');
    Route::get('/search-loan', [\App\Http\Controllers\LoanController::class,'search'])->name('search-loan');

    Route::resource('salaries', '\App\Http\Controllers\SalaryController');
    Route::post('salaries/save', [\App\Http\Controllers\SalaryController::class, 'saveSalary'])->name('save-salary');
    Route::get('salaries/cetak/{id}', [\App\Http\Controllers\SalaryController::class, 'cetakSlipGaji'])->name('cetak-slip-gaji');
    Route::get('/search-salary', [\App\Http\Controllers\SalaryController::class,'search'])->name('search-salary');

    Route::resource('users', '\App\Http\Controllers\UserController');
    Route::get('/search-user', [\App\Http\Controllers\UserController::class,'search'])->name('search-user');

    Route::resource('laporan', '\App\Http\Controllers\LaporanController');
});
