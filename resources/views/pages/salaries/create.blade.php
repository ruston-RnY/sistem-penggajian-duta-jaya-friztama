@extends('layouts.main')

@section('title', 'Admin | Gaji Karyawan')
 
@section('content')
    <div class="content">
        @if(isset($attendance) && isset($attendance->karyawan->pinjaman->jumlah_angsuran))
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Perhitungan Gaji Karyawan - <span>Periode {{ \Carbon\Carbon::create($attendance->periode)->translatedFormat('F Y') }}</span></h4>
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
                    <form action="{{ route('salaries.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="tanggal" value="{{ $attendance->karyawan->nama }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="tanggal" value="{{ $attendance->karyawan->jabatan->nama_jabatan }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Gaji Pokok</label>
                                <input type="text" class="form-control" name="tanggal" value="{{ number_format($attendance->karyawan->jabatan->gaji) }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Potongan</label>
                                <input type="text" class="form-control" name="tanggal" value="{{ number_format($attendance->karyawan->pinjaman->jumlah_angsuran) }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Total Jam Lembur</label>
                                <input type="text" class="form-control" name="tanggal" value="{{ $attendance->total_jam_lembur }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Total Hari Kerja</label>
                                <input type="text" class="form-control" name="tanggal" value="{{ $attendance->total_hari_kerja }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal">Tanggal Penetapan</label>
                                <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bonus">Bonus</label>
                                <input type="text" class="form-control" name="bonus" value="{{ old('bonus') }}">
                            </div>
                        </div>
                        <a href="{{ route('salaries.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        @else
            <p>Oops !! Data karyawan tidak ditemukan</p>
            <p>Periksa kembali periode gaji dan nama karyawan yang dipilih</p>
            <a href="{{ route('salaries.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        @endif
    </div>
@endsection