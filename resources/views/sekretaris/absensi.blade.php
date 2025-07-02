<!DOCTYPE html>
<html>
<head>
    <title>Absensi Kelas {{ $jenjang }}</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Absensi Santri - Kelas {{ $jenjang }}</h2>
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
            @foreach($santri as $i => $s)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->jenjang }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
