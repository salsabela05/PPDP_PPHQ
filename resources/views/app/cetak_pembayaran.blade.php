<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran</title>
</head>
<body onload="window.print()">
<center>
    
    <h3>laporan Pembayaran</h3>
</center>

<div class="card">
    <div class="card-body">
        <table class="table" width="100%" border="1">
        <thead>
                <tr>
                    <th>No</th>
                    <th>calon santri</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->formulir->nama }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->status }}</td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>