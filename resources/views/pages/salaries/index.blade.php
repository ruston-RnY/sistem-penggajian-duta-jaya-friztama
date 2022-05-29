@extends('layouts.main')

@section('title', 'Admin | Gaji')
 
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Pilih Karyawan</h4>
                </div>
                <div class="card-body card-block">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('salaries.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal">Pilih Periode Gaji</label>
                                {{-- <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}"> --}}
                                <input type="month" class="form-control" name="tanggal" min="2018-03" value="{{ old('tanggal') }}">
                            </div>
        
                            <div class="form-group col-md-6">
                                <label>Nama Karyawan</label>
                                <select name="karyawan_id" class="form-control" required >
                                    <option value="">Pilih Karyawan</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
        
                        <button type="reset" class="btn btn-secondary btn-sm">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{-- <a href="{{ route('salaries.create') }}" class="btn btn-primary btn-sm">
                Tambah
            </a> --}}
            <h4 class="box-title">Data Gaji</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-stats order-table">
                <table class="table table-bordered ">
                    <thead>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gaji Bersih</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($salaries as $no => $salary)
                            <tr>
                                <td>{{ $no + $salaries->firstItem() }}.</td>
                                <td>{{ \Carbon\Carbon::create($salary->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>#{{ $salary->karyawan->nama }}</td>
                                <td>tes</td>
                                <td>Rp {{ number_format($salary->total_gaji) }}</td>
                                <td>
                                    <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this data?')">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-4">
                                    Data kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $salaries->links() }}
            </div>
        </div>
    </div>
</div>
@endsection