@extends('layouts.main')

@section('title', 'Admin | Absensi')
 
@section('content')
<div class="content">
    @if (auth()->user()->role == 'ADMIN')
        <h4 class="box-title mb-4">Data Absensi</h4>
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <a href="{{ route('attendances.create') }}" class="btn btn-primary btn-sm">
                    Tambah
                </a>
                <form action="{{ route('search-attendance') }}" method="GET" class="form-inline ml-auto">
                    @csrf
                    <label for="periode" class="mr-2">Cari Periode</label>
                    <input type="month" class="form-control mr-2" name="search" min="2020-03">
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
                            <th>Nama</th>
                            <th>Periode</th>
                            <th>Total Kerja</th>
                            <th>Total Lembur</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($attendances as $no => $attendance)
                                <tr>
                                    <td>{{ $no + $attendances->firstItem() }}.</td>
                                    <td>{{ $attendance->karyawan->nama }}</td>
                                    <td>{{ \Carbon\Carbon::create($attendance->periode)->translatedFormat('F - Y') }}</td>
                                    <td>{{ $attendance->total_hari_kerja }} - hari</td>
                                    <td>{{ $attendance->total_jam_lembur }} - jam</td>
                                    <td>{{ $attendance->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="d-inline">
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
                    {{ $attendances->links() }}
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