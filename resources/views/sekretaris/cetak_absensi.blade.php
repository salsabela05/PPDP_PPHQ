<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Absensi Santri</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid black;
        }
    </style>
</head>
<body onload="window.print()">
    <center>
        <h3>Daftar Absensi Santri</h3>
        <h4>Kelas: {{ $kelas }}</h4>
    </center>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenjang</th>
                <th>TTD</th>
            </tr>
        </thead>
        <tbody>
            @foreach($santri as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->jenjang }}</td>
                    <td style="height: 40px;"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
