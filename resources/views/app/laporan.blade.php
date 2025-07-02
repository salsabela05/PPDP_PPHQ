@extends("app/_layout")
@section("konten")

<div class="d-flex mb-3">
    
<h3>Laporan Data Santri</h3>
<div class="ml-auto">
    <a href="/app/laporan/cetak" class="btn btn-primary">cetak laporan</a>
    <a href="/app/laporan/export/pdf" class="btn btn-danger">Export PDF</a>
</div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead style="background-color: #0d6efd; color: white; text-align: center;">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Nama Wali</th>
                    <th>Tahun Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $index => $p)
                    <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $p->formulir->nama }}</td>
                        <td>{{ $p->formulir->nik }}</td>
                        <td>{{ $p->formulir->tempat_lahir}}</td>
                        <td>{{ $p->formulir->jenis_kelamin }}</td>
                        <td>{{ $p->formulir->alamat }}</td>
                        <td>{{ $p->formulir->nama_wali }}</td>
                        <td>{{ date('Y', strtotime($p->formulir->created_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection