@extends('layouts.main')

@section('title', 'Admin | Manage Users')
 
@section('content')
<div class="content">
    <h4 class="box-title mb-4">Data Users</h4>
    <div class="card">
        <div class="card-header d-flex">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal di Daftarkan</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($users as $no => $data)
                            <tr>
                                <td>{{ $no + $users->firstItem() }}.</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->role }}</td>
                                <td>{{ \Carbon\Carbon::create($data->created_at)->translatedFormat('l, d F Y') }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-5 text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection