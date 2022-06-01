@extends('layouts.main')

@section('title', 'Admin Dashboard')
 
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col">
                <div class="card p-4">
                    <h3 class="mb-2">PT. Duta Jaya Friztama</h3>
                    <p>Merupakan sebuah perusahaan yang bergerak dibidang penjualan obat pembersih dan penyedia jasa konstruksi maintenance gedung.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $totalEmployee }}</span></div>
                                    <div class="stat-heading">Karyawan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-id"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $totalUser }}</span></div>
                                    <div class="stat-heading">User</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-date"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span>Tanggal</span></div>
                                    <div class="stat-heading">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h4 class="box-title">Laporan Gaji Terbaru</h4>
                            <a href="{{ route('salaries.index') }}" class="btn btn-primary btn-sm ml-auto">
                                Selengkapnya
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-stats order-table ov-h">
                                <table class="table table-bordered ">
                                    <thead>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Gaji Bersih</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($salaries as $no => $salary)
                                            <tr>
                                                <td>{{ $no + $salaries->firstItem() }}.</td>
                                                <td>{{ \Carbon\Carbon::create($salary->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                <td>{{ $salary->karyawan->nama }}</td>
                                                <td>{{ $salary->karyawan->jabatan->nama_jabatan }}</td>
                                                <td>Rp {{ number_format($salary->total_gaji) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center p-4">
                                                    Data kosong
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $salaries->links() }}
                            </div> 
                        </div>
                    </div>
                </div>  

                {{-- <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistik</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><i class="fa fa-times-circle text-danger mr-3"></i>Transaction Failed <span class="text-dark text-bold">1</span></p>
                            <p class="card-text"><i class="fa fa-check-circle text-danger mr-3"></i>Transaction Success <span class="text-dark text-bold">2</span></p>
                            <p class="card-text"><i class="fa fa-spinner text-danger mr-3"></i>Transaction Pending <span class="text-dark text-bold">2</span></p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection