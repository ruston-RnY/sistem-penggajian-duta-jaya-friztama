@extends('layouts.main')

@section('title', 'Admin | Gaji Karyawan')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Tambah Data Gaji Karyawan</h4>
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
                        <div class="form-group col-md-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ $attendances[0]->karyawan->nama }}" readonly>
                        </div>

                        {{-- <div class="form-group col-md-6">
                            <label>Nama Karyawan</label>
                            <select name="karyawan_id" class="form-control" required >
                                <option value="">Pilih Karyawan</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ $attendances[0]->karyawan->jabatan->nama_jabatan }}" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Total Jam Kerja</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ $total_jam_kerja }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Total Jam Lembur</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ $total_jam_lembur }}" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Potongan</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ number_format($total_angsuran) }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Gaji Pokok</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ number_format($attendances[0]->karyawan->jabatan->gaji) }}" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="bonus">Bonus</label>
                            <input type="text" class="form-control" name="bonus" value="{{ old('bonus') }}">
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