@extends('layouts.main')

@section('title', 'Admin | Jabatan')
 
@section('content')
<div class="content">
    @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'PERSONALIA')
        <h4 class="box-title mb-4">Data Jabatan</h4>
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ route('positions.create') }}" class="btn btn-primary btn-sm">
                    Tambah
                </a>
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
                            <th>Nama Jabatan</th>
                            <th>Gaji</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($positions as $no => $position)
                                <tr>
                                    <td>{{ $no + $positions->firstItem() }}.</td>
                                    <td>{{ $position->nama_jabatan }}</td>
                                    <td>Rp {{ number_format($position->gaji) }}</td>
                                    <td>
                                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline">
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
                    {{ $positions->links() }}
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