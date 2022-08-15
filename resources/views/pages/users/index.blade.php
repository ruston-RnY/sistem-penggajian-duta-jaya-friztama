@extends('layouts.main')

@section('title', 'Admin | Manage Users')
 
@section('content')
<div class="content">
    @if (auth()->user()->role == 'ADMIN' || auth()->user()->role == 'DIREKTUR')
        <h4 class="box-title mb-4">Data Users</h4>
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                    Tambah
                </a>
                <form action="{{ route('search-user') }}" method="GET" class="form-inline ml-auto">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari user..." aria-label="Search" name="search" size="12">
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