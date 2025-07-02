<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f0f0f0; }
        .ttd-container { margin-top: 50px; width: 100%; display: flex; justify-content: space-between; }
        .ttd { text-align: center; width: 200px; float: right; }
    </style>
</head>
<body>
    <h3 align="center">Laporan Data Santri</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat, Tgl Lahir</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Nama Wali</th>
                <th>Tahun Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $index => $p)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $p->formulir->nama }}</td>
                    <td>{{ $p->formulir->nik }}</td>
                    <td>{{ $p->formulir->tempat_lahir }}</td>
                    <td>{{ $p->formulir->jenis_kelamin }}</td>
                    <td>{{ $p->formulir->alamat }}</td>
                    <td>{{ $p->formulir->nama_wali }}</td>
                    <td>{{ date('Y', strtotime($p->formulir->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd-container">
        <div class="ttd">
            <p>Metro, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <br><br><br>
            <p>Pondok Pesantren Hidayatul Qur'an</p>
        </div>
    </div>
</body>
</html>
