@extends('layouts.laporan')
@section('title', 'Admin | Detail Salary')

@section('content')
    <div class="content">
        <div class="row mt-8">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Slip Gaji</h5>
                    </div>
                    <div class="card-body">
                        <div class="heading mb-2 d-flex justify-content-between">
                            <h5>PT. Duta Jaya Friztama</h5>
                            <div class="periode">
                                <h5>Periode Gaji</h5>
                                <p>{{ \Carbon\Carbon::create($salary->karyawan->absensi->periode)->translatedFormat('F - Y') }}</p>
                            </div>
                        </div>
                        <div class="table-stats ">
                            <table class="table table-bordered">
                                <tr>
                                    <td>ID Karyawan</td>
                                    <td>#{{ $salary->karyawan->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Karyawan</td>
                                    <td>{{ $salary->karyawan->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>{{ $salary->karyawan->jabatan->nama_jabatan }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $salary->karyawan->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Total Hari Kerja</td>
                                    <td>{{ $salary->karyawan->absensi->total_hari_kerja }} hari</td>
                                </tr>
                                <tr>
                                    <td>Total Lembur</td>
                                    <td>{{ $salary->karyawan->absensi->total_jam_lembur }} jam</td>
                                </tr>
                                <tr>
                                    <td>Detail Gaji</td>
                                    <td>
                                        <div class="order-table">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Gaji Pokok</th>
                                                    <th>Bonus</th>
                                                    <th>Lembur</th>
                                                    <th>Gaji Bersih</th>
                                                </tr>
                                                    <tr>
                                                        <td>Rp. {{ number_format($salary->karyawan->jabatan->gaji) }}</td>
                                                        <td>Rp. {{ number_format($salary->bonus) }}</td>
                                                        <td>Rp. {{ number_format($salary->upah_lembur) }}</td>
                                                        <td>Rp. {{ number_format($salary->total_gaji) }}</td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="trigger">
                                <span style="font-size: 12px; font-style: italic">print by &copy; PT. Duta Jaya Friztama</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        window.print()
    </script>
@endpush