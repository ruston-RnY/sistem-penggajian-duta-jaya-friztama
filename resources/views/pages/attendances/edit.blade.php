@extends('layouts.main')

@section('title', 'Admin | Absensi')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Edit Data Absensi</h4>
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
                <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Karyawan</label>
                            <select name="karyawan_id" class="form-control" readonly >
                                <option value="{{ $attendance->karyawan->id }}">{{ $attendance->karyawan->nama }} (Karyawan saat ini)</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ $attendance->tanggal }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jam_kerja">Jam Kerja</label>
                            <input type="number" name="jam_kerja" rows="4" class="form-control" value="{{ $attendance->jam_kerja }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jam_lembur">Jam Lembur</label>
                            <input type="number" name="jam_lembur" rows="4" class="form-control" value="{{ $attendance->jam_lembur }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" rows="5" class="form-control">{{ $attendance->keterangan }}</textarea>
                        </div>
                    </div>

                    <a href="{{ route('attendances.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection