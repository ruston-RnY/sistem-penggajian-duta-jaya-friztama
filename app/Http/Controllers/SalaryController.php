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
        
        $attendance = Attendance::where('periode', $request->tanggal)->where('karyawan_id', $request->karyawan_id)->with('karyawan.pinjaman')->find($request->karyawan_id);
        return view('pages.salaries.create', [
            'attendance' => $attendance,
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

    public function saveSalary(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'bonus' => 'required'
        ]);

        // dd($request->all());

        $data = Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'absensi_id' => $request->absensi_id,
            'pinjaman_id' => $request->pinjaman_id,
            'tanggal' => $request->tanggal,
            'bonus' => $request->bonus,
            'upah_lembur' => $request->total_jam_lembur * 20000,
            'total_gaji' => $request->gaji_pokok + $request->bonus + ($request->total_jam_lembur * 20000) - $request->potongan,
            'sisa_pinjaman' => $request->jumlah_pinjaman - $request->potongan,
        ]);

        if ($request->pinjman_id) {
            $selectedData = Loan::find($request->pinjaman_id);
            $selectedData->update([
                'karyawan_id' => $request->karyawan_id,
                'total_pinjaman' => $data->sisa_pinjaman,
            ]); 
        }

        $salaries = Salary::with('karyawan')->paginate(5);
        $employees = Employee::with('absensi', 'jabatan')->get();
        return view('pages.salaries.index', compact('salaries','employees'));
    }
}
