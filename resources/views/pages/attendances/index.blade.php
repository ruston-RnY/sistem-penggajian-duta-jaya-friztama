@extends('layouts.main')

@section('title', 'Admin | Absensi')
 
@section('content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex">
            <a href="{{ route('attendances.create') }}" class="btn btn-primary btn-sm">
                Tambah
            </a>
            <h4 class="box-title ml-auto">Data Absensi</h4>
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
                        <th>Tanggal</th>
                        <th>Jam Kerja</th>
                        <th>Jam Lembur</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $no => $attendance)
                            <tr>
                                <td>{{ $no + $attendances->firstItem() }}.</td>
                                <td>#{{ $attendance->karyawan->nama }}</td>
                                <td>{{ $attendance->tanggal }}</td>
                                <td>{{ $attendance->jam_kerja }} jam</td>
                                <td>{{ $attendance->jam_lembur }} jam</td>
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
</div>
@endsection