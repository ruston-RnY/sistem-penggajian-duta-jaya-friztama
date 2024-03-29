<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('jabatan')->paginate(5);
        return view('pages.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        return view('pages.employees.create', compact('positions'));
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
            'nama' => 'required',
            'telpon' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jabatan_id' => 'required',
            'tanggal_masuk' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png|max:100'
        ]);

        $data = $request->all();
        $data['foto'] = $request->file('foto')->store(
            'assets/',
            'public'
        );

        Employee::create($data);
        return redirect()->route('employees.index');
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
        $employee = Employee::with('jabatan')->findOrFail($id);
        $positions = Position::all();
        return view('pages.employees.edit', compact('employee', 'positions'));
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
            'nama' => 'required',
            'telpon' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jabatan_id' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        $data = $request->all();

        if ($request->has('foto')) {
            $request->validate([
                'foto' => 'required|file|image|mimes:jpeg,png|max:100'
            ]);
            $data['foto'] = $request->file('foto')->store(
                'assets/',
                'public'
            );
        }
        
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        
        Attendance::where('karyawan_id', $id)->delete();

        return redirect()->route('employees.index');
    }

    public function search(Request $request)
    {
        $employees = Employee::where('nama', $request->search)->orWhere('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        return view('pages.employees.index', compact('employees'));
    }
}
