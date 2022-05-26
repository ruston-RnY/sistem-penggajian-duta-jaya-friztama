@extends('layouts.main')

@section('title', 'Edit Karyawan')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Edit Data Karyawan</h4>
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
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $employee->nama }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telpon">Telpon</label>
                            <input type="text" name="telpon" rows="4" class="form-control" value="{{ $employee->telpon }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ $employee->tanggal_lahir }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" rows="4" class="form-control" value="{{ $employee->alamat }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <select name="jabatan_id" class="form-control" required >
                                <option value="{{ $employee->jabatan->id }}">{{ $employee->jabatan->nama_jabatan }} (Jabatan saat ini)</option>
                                <option value="">Pilih Jabatan</option>
                                @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" rows="4" class="form-control" value="{{ $employee->tanggal_masuk }}">
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