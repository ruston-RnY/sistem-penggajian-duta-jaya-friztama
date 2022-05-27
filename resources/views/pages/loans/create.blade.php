@extends('layouts.main')

@section('title', 'Admin | Pinjaman Karyawan')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Tambah Data Pinjaman Karyawan</h4>
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
                <form action="{{ route('loans.store') }}" method="POST">
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
                            <label for="tanggal_pinjaman">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_pinjaman" value="{{ old('tanggal_pinjaman') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                            <input type="number" name="jumlah_pinjaman" rows="4" class="form-control" value="{{ old('jumlah_pinjaman') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jumlah_angsuran">Jumlah Angsuran</label>
                            <input type="number" name="jumlah_angsuran" rows="4" class="form-control" value="{{ old('jumlah_angsuran') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" rows="5" class="form-control" value="{{ old('keterangan') }}"></textarea>
                        </div>
                    </div>

                    <a href="{{ route('loans.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection