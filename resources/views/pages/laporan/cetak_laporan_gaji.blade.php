@extends('layouts.laporan')
@section('title', 'Admin | Detail Salary')

@push('custom-style')
    <style>
        .content,p,h3{
            font-family: 'Poppins', sans-serif
        }
    </style>
@endpush

@section('content')
    <div class="content">
        <div class="text-center">
            <h3>Laporan Data Gaji PT. Duta Jaya Friztama</h3>
            <p class="mb-0">Jalan Rama Raya No.57 Cengkareng Jakarta Barat</p>
            <p>Periode Penetapan : {{ \Carbon\Carbon::create($periode_mulai)->format('d M Y') }} s/d {{ \Carbon\Carbon::create($periode_akhir)->format('d M Y') }}</p>
        </div>
        <div class="row mt-8">
            <div class="col-12">
                <div class="table-stats order-table">
                    <table class="table table-bordered ">
                        <thead>
                            <th>#</th>
                            <th>Tanggal Penetapan</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Bonus</th>
                            <th>Upah Lembur</th>
                            <th>Gaji Bersih</th>
                        </thead>
                        <tbody>
                            @forelse ($salaries as $no => $salary)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ \Carbon\Carbon::create($salary->tanggal)->translatedFormat('l, d F Y') }}</td>
                                    <td>{{ $salary->karyawan->nama }}</td>
                                    <td>{{ $salary->karyawan->jabatan->nama_jabatan }}</td>
                                    <td>Rp {{ number_format($salary->karyawan->jabatan->gaji) }}</td>
                                    <td>Rp {{ number_format($salary->bonus) }}</td>
                                    <td>Rp {{ number_format($salary->upah_lembur) }}</td>
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
                    <div class="trigger">
                        <span style="font-size: 12px; font-style: italic">print by &copy; PT. Duta Jaya Friztama</span>
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