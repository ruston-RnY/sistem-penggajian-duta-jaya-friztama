@extends('layouts.main')

@section('title', 'Admin | Gaji Karyawan')
 
@section('content')
    <div class="content">
        @if(isset($salary))
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Edit Perhitungan Gaji Karyawan</h4>
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
                    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="karyawan_id" value="{{ $salary->karyawan->id }}">
                        <input type="hidden" name="absensi_id" value="{{ $salary->id }}">
                        @if (isset($salary->karyawan->pinjaman->jumlah_angsuran))
                            <input type="hidden" name="pinjaman_id" value="{{ $salary->karyawan->pinjaman->id }}">
                            <input type="hidden" name="jumlah_pinjaman" value="{{ $salary->karyawan->pinjaman->jumlah_pinjaman }}">
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $salary->karyawan->nama }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="{{ $salary->karyawan->jabatan->nama_jabatan }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Gaji Pokok</label>
                                <input type="text" class="form-control" name="gaji_pokok" value="{{ $salary->karyawan->jabatan->gaji }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            @if (isset($salary->karyawan->pinjaman->jumlah_angsuran))
                                <div class="form-group col-md-4">
                                    <label>Potongan Pinjaman</label>
                                    <input type="text" class="form-control" name="potongan" value="{{ $salary->karyawan->pinjaman->jumlah_angsuran ? $salary->karyawan->pinjaman->jumlah_angsuran : 0 }}" readonly>
                                </div>
                            @endif
                            <div class="form-group col-md-4">
                                <label>Potongan Pinjaman</label>
                                <input type="text" class="form-control" name="potongan" value="0" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Total Jam Lembur</label>
                                <input type="text" class="form-control" name="total_jam_lembur" value="{{ $salary->karyawan->absensi->total_jam_lembur }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Total Hari Kerja</label>
                                <input type="text" class="form-control" name="total_hari_kerja" value="{{ $salary->karyawan->absensi->total_hari_kerja }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal">Tanggal Penetapan</label>
                                <input type="date" class="form-control" name="tanggal" value="{{ $salary->tanggal }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bonus">Bonus</label>
                                <input type="text" class="form-control" name="bonus" value="{{ $salary->bonus }}">
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