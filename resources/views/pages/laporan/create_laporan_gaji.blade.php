@extends('layouts.main')

@section('title', 'Admin | Cetak Laporan Penjualan')
 
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="box-title">Cetak Laporan Gaji</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.store') }}" method="POST" target="_blank">
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih Tanggal Mulai</label>
                                <input type="date" class="form-control" name="periode_mulai" min="2020-03" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Tanggal Akhir</label>
                                <input type="date" class="form-control" name="periode_akhir" min="2020-03" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection