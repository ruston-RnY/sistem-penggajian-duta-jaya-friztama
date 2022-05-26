@extends('layouts.main')

@section('title', 'Tambah Karyawan')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Tambah Data Karyawan</h4>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telpon">Telpon</label>
                            <input type="text" name="telpon" rows="4" class="form-control @error('telpon') is-invalid @enderror">{{ old('telpon') }}</input>
                            @error('telpon')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" rows="4" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</input>
                            @error('alamat')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gaji">Gaji</label>
                            <input type="number" class="form-control @error('gaji') is-invalid @enderror" name="gaji" value="{{ old('gaji') }}">
                            @error('gaji')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" rows="4" class="form-control @error('tanggal_masuk') is-invalid @enderror">{{ old('tanggal_masuk') }}</input>
                            @error('tanggal_masuk')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}">
                            @error('foto')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection