@extends('layouts.main')

@section('title', 'Tambah Karyawan')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Tambah Data Karyawan</h4>
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
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telpon">Telpon</label>
                            <input type="text" name="telpon" rows="4" class="form-control">{{ old('telpon') }}</input>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" rows="4" class="form-control">{{ old('alamat') }}</input>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <select name="jabatan_id" class="form-control" required >
                                <option value="">Pilih Jabatan</option>
                                @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" rows="4" class="form-control">{{ old('tanggal_masuk') }}</input>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">
                        </div>
                    </div>
                    
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection