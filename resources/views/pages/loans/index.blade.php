@extends('layouts.main')

@section('title', 'Admin | Pinjaman Karyawan')
 
@section('content')
<div class="content">
    @if (auth()->user()->role == 'ADMIN')
        <h4 class="box-title mb-4">Data Pinjaman Karyawan</h4>
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <a href="{{ route('loans.create') }}" class="btn btn-primary btn-sm">
                    Tambah
                </a>
                <form action="{{ route('search-loan') }}" method="GET" class="form-inline ml-auto">
                    @csrf
                    <label for="periode" class="mr-2">Cari Tanggal</label>
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
                            <th>Nama</th>
                            <th>Tanggal Pinjaman</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Angsuran</th>
                            <th>Sisa Pinjaman</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($loans as $no => $loan)
                                <tr>
                                    <td>{{ $no + $loans->firstItem() }}.</td>
                                    <td>{{ $loan->karyawan->nama }}</td>
                                    <td>{{ \Carbon\Carbon::create($loan->tanggal_pinjaman)->translatedFormat('l, d F Y') }}</td>
                                    <td>Rp {{ number_format($loan->jumlah_pinjaman) }}</td>
                                    <td>Rp {{ number_format($loan->jumlah_angsuran) }} /bulan</td>
                                    <td>Rp {{ number_format($loan->total_pinjaman) }} /bulan</td>
                                    <td>{{ $loan->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="d-inline">
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
                    {{ $loans->links() }}
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