<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::with('karyawan')->paginate(5);
        $employees = Employee::with('absensi', 'jabatan')->get();
        // dd($salaries);
        return view('pages.salaries.index', compact('salaries','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd($request);
        // return view('pages.salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'karyawan_id' => 'required'
        ]);
        
        // $attendance = Attendance::whereMonth('created_at', date('m'))
        // ->whereYear('created_at', date('Y'))
        // ->get(['jam_kerja','created_at']);
        
        dd($request->all());
        
        $attendance = Attendance::where('tanggal', $request->tanggal)->where('karyawan_id', $request->karyawan_id)->with('karyawan.pinjaman')->find($request->karyawan_id);
        // dd($attendance);
        $loans = Loan::where('karyawan_id', $request->karyawan_id)->get();
        // $attendances = Attendance::where('karyawan_id', $request->karyawan_id)->with('karyawan.pinjaman')->get();
        // $total_hari_kerja = $attendance->sum('total_hari_kerja');
        // $total_jam_lembur = $attendance->sum('total_jam_lembur');
        // $total_pinjaman = $loans->sum('jumlah_pinjaman');
        // $total_angsuran = $loans->sum('jumlah_angsuran');
        
        return view('pages.salaries.create', [
            'attendance' => $attendance,
            // 'total_hari_kerja' => $total_hari_kerja,
            // 'total_jam_lembur' => $total_jam_lembur,
            // 'total_pinjaman' => $total_pinjaman,
            // 'total_angsuran' => $total_angsuran
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
