<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $salaries = Salary::with('karyawan')->paginate(5);
        $employees = Employee::with('absensi', 'jabatan')->get();

        $totalEmployee = Employee::count();
        $totalUser = User::count();

        return view('dashboard', compact('salaries','employees', 'totalEmployee', 'totalUser'));
    }
}
