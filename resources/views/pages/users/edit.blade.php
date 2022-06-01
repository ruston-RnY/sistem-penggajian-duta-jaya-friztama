@extends('layouts.main')

@section('title', 'Tambah User')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Edit Data User</h4>
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
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nama</label>
                            <input type="text" name="name" placeholder="Nama user" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="contoh email@domain.com" class="form-control" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <option value="{{ $user->role }}">{{ $user->role }} (Role saat ini)</option>
                                <option value="">Pilih Role</option>
                                <option value="ADMIN">Admin</option>
                                <option value="MANAGER">Manager</option>
                                <option value="DIREKTUR">Direktur</option>
                            </select>
                        </div>
                    </div>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection