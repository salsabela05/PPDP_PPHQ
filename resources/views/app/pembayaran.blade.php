@extends("app/_layout")
@section("konten")

<div class="card">
    <div class="card-body">
        <h3>Upload Bukti Pembayaran</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/app/pembayaran/submit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label>Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <button class="btn btn-primary mb-0">Upload</button>
        </form>

        <h3 class="mt-4">Riwayat Pembayaran</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>Kwitansi</th> 
                </tr>
            </thead>
            <tbody>
               @foreach($pembayaran as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td><a href="{{ asset('storage/' . $p->bukti) }}" target="_blank">Lihat Bukti</a></td>
                        <td>
                            {{ $p->status }}
                            @if ($p->status_info)
                                - {{ $p->status_info }}
                            @endif
                        </td>
                        <td>
                            @if ($p->status == 'dikonfirmasi' && $p->kwitansi)
                                <a href="{{ asset('storage/' . $p->kwitansi) }}" class="btn btn-sm btn-success" target="_blank">
                                    Unduh Kwitansi
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection