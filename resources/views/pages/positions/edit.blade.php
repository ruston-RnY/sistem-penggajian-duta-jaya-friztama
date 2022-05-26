@extends('layouts.main')

@section('title', 'Edit Jabatan')
 
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="box-title">Edit Data Jabatan</h4>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('positions.update', $position->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" name="nama_jabatan" value="{{ $position->nama_jabatan }}">
                            @error('nama_jabatan')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gaji">Gaji</label>
                            <input type="number" class="form-control @error('gaji') is-invalid @enderror" name="gaji" value="{{ $position->gaji }}">
                            @error('gaji')
                                <small class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection