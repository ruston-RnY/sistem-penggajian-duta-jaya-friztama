<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('id', 'desc')->paginate(5);
        return view('pages.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.positions.create');
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
            'nama_jabatan' => 'required',
            'gaji' => 'required',
        ]);

        $data = $request->all();

        Position::create($data);
        return redirect()->route('positions.index');
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
        $position = Position::findOrFail($id);
        return view('pages.positions.edit', compact('position'));
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
            'nama_jabatan' => 'required',
            'gaji' => 'required',
        ]);

        $data = $request->all();
        $position = Position::findOrFail($id);

        $position->update($data);
        return redirect()->route('positions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Position::findOrFail($id);
        $data->delete();

        return redirect()->route('positions.index');
    }

    public function search(Request $request)
    {
        $positions = Position::where('nama_jabatan', $request->search)->orWhere('nama_jabatan', 'LIKE', '%' . $request->search . '%')->paginate(5);
        return view('pages.positions.index', compact('positions'));
    }
}
