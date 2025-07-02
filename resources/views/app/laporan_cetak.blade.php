<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        h3 {
            margin-top: 20px;
        }
        .ttd {
            margin-top: 60px;
            width: 100%;
        }
        .ttd td {
            border: none;
            text-align: right;
            padding-right: 50px;
        }
    </style>
</head>
<body onload="window.print()">

<center>
    <h3>Laporan Data Santri</h3>
</center>

<table>
    <thead>
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
                <td style="text-align: center">{{ $index + 1 }}</td>
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

<table class="ttd">
    <tr>
        <td>Metro, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
    </tr>
    <tr><td style="height: 60px;"></td></tr>
     <tr>
        <td>Pondok Pesantren Hidayatul Qur'an</td>
    </tr>
</table>

</body>
</html>
