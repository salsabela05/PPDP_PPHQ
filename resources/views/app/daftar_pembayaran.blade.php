@extends("app/_layout")
@section("konten")

<div class="card">
    <div class="card-body">

        <h3 class="mt-4">Riwayat Pembayaran</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>calon santri</th>
                    <th>Keterangan</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->formulir->nama }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td><a href="{{ asset('storage/' . $p->bukti) }}" target="_blank">Lihat Bukti</a></td>
                        <td>
                            {{ $p->status }}
                            @if ($p->status_info)
                                <br> <small>{{ $p->status_info }}</small>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $p->id }}">
                                Tolak
                            </button>
                            <form action="/app/daftar-pembayaran/konfirmasi/{{ $p->id }}" onclick="return confirm('apakah anda yakin ingin konfirmasi pembayaran?')" method="post">
                                @csrf
                                <button class="btn btn-primary">
                                    konfirmasi 
                                </button>
                            </form>
                                @if ($p->status == 'dikonfirmasi' && $p->kwitansi)
                                    <a href="{{ asset($p->kwitansi) }}" class="btn btn-success mt-2" target="_blank">
                                        Unduh Kwitansi
                                    </a>
                                @endif
                        </td>
                    </tr>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tolak Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <form action="/app/daftar-pembayaran/tolak/{{ $p->id }}" method="post">
                                        @csrf
                                        <label for="">Alasan Ditolak</label>
                                        <input type="text" class="form-control" name="status_info">
                                        <button class="btn btn-danger mt-2">Tolak Pembayaran</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection