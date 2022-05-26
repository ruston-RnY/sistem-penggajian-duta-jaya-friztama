@extends('layouts.main')

@section('title', 'Admin | Absensi')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Tambah Data Absensi</h4>
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
                <form action="{{ route('attendances.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Karyawan</label>
                            <select name="karyawan_id" class="form-control" required >
                                <option value="">Pilih Karyawan</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jam_kerja">Jam Kerja</label>
                            <input type="number" name="jam_kerja" rows="4" class="form-control">{{ old('jam_kerja') }}</input>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jam_lembur">Jam Lembur</label>
                            <input type="number" name="jam_lembur" rows="4" class="form-control">{{ old('jam_lembur') }}</input>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" rows="5" class="form-control" value="{{ old('keterangan') }}"></textarea>
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