<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::with('karyawan')->paginate(5);
        return view('pages.loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('pages.loans.create', compact('employees'));
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
            'karyawan_id' => 'required',
            'tanggal_pinjaman' => 'required',
            'jumlah_pinjaman' => 'required',
            'jumlah_angsuran' => 'required',
        ]);

        Loan::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'jumlah_angsuran' => $request->jumlah_angsuran,
            'total_pinjaman' => $request->jumlah_pinjaman,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('loans.index');
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
        $loan = Loan::with('karyawan')->findOrFail($id);
        return view('pages.loans.edit', compact('loan'));
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
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal_pinjaman' => 'required',
            'jumlah_pinjaman' => 'required',
            'jumlah_angsuran' => 'required',
        ]);

        $selectedData = Loan::findOrFail($id);
        $selectedData->update([
            'karyawan_id' => $request->karyawan_id,
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'jumlah_angsuran' => $request->jumlah_angsuran,
            'total_pinjaman' => $request->jumlah_pinjaman,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index');
    }

    public function search(Request $request)
    {
        $loans = Loan::where('tanggal_pinjaman', $request->search)->orWhere('tanggal_pinjaman', 'LIKE', '%' . $request->search . '%')->paginate(5);
        return view('pages.loans.index', compact('loans'));
    }
}
