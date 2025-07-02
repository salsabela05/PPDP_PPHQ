<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kwitansi Pembayaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }
        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
            border: 2px solid #000;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info table {
            width: 100%;
        }
        .info td {
            padding: 6px 0;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .ttd {
            margin-top: 60px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kwitansi Pembayaran</h2>

        <div class="info">
            <table>
                <tr>
                    <td width="30%">Nama</td>
                    <td>: {{ $pembayaran->formulir->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>: {{ $pembayaran->keterangan }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ \Carbon\Carbon::parse($pembayaran->created_at)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>: {{ $pembayaran->status }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            Metro, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>

        <div class="ttd">
            <br><br><br>
            <strong>Pondok Pesantren Hidayatul Qur'an</strong>
        </div>
    </div>
</body>
</html>
