@extends('layouts.main')

@section('title', 'Admin | Gaji')
 
@section('content')
<div class="content">
    @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
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
                                    <input type="month" class="form-control" name="tanggal" min="2020-03" placeholder="Pilih periode">
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
            <div class="card-header d-flex align-items-center">
                <h4 class="box-title">Data Gaji</h4>
                @isset ($key)
                    <h4 class="box-title ml-5 font-italic">'Filter {{ \Carbon\Carbon::create($key)->translatedFormat('l, d F Y') }}'</h4>
                @endisset
                <form action="{{ route('search-salary') }}" method="GET" class="form-inline ml-auto">
                    @csrf
                    <label for="periode" class="mr-2">Tanggal Penetapan</label>
                    <input type="date" class="form-control mr-2" name="search">
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
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
                            <th>Tanggal Penetapan</th>
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
                                    <td>{{ $salary->karyawan->nama }}</td>
                                    <td>{{ $salary->karyawan->jabatan->nama_jabatan }}</td>
                                    <td>Rp {{ number_format($salary->total_gaji) }}</td>
                                    <td>
                                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-info btn-sm">
                                            <i class="far fa-eye"></i>
                                        </a>
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
    @else
        <div class="container px-4 d-flex" style="height: 80vh">
            <div class="m-auto card p-4 text-center">
                <h4>Opps, sayangnya anda tidak memiliki akses untuk fitur ini!</h4>
                <p>Hubungi admin untuk mendapatkan akses.</p>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm text-center">Home</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection