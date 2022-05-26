@extends('layouts.main')

@section('title', 'Admin | Karyawan')
 
@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h4 class="box-title">Data Karyawan</h4>
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
                        <th>Email</th>
                        <th>Telpon</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Gaji</th>
                        <th>Tanggal Masuk</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($employees as $no => $employee)
                            <tr>
                                <td>{{ $no + $employees->firstItem() }}.</td>
                                <td>#{{ $employee->nama }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->telpon }}</td>
                                <td>{{ \Carbon\Carbon::create($employee->tanggal_lahir)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $employee->alamat }}</td>
                                <td>Rp {{ number_format($employee->gaji) }}</td>
                                <td>{{ \Carbon\Carbon::create($employee->tanggal_masuk)->translatedFormat('l, d F Y') }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
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
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
@endsection