<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f0f0f0; }
        .ttd {
            margin-top: 40px;
            width: 100%;
        }
        .ttd td {
            border: none;
            text-align: right;
            padding-right: 50px;
        }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Laporan Pembayaran Calon Santri</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->formulir->nama ?? '-' }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $p->status }}</td>
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
