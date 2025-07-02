@extends("app/_layout")
@section("konten")

<div class="container">
    <h3 class="my-4">Daftar Formulir Calon Santri</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Asal Sekolah</th>
                <th>No HP Santri</th>
                <th>Link Berkas</th>
                <th>Surat Perjanjian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formulir as $f)
            <tr>
                <td>{{ $f->nama }}</td>
                <td>{{ $f->asal_sekolah }}</td>
                <td>{{ $f->nohp_santri }}</td>
                <td>
                    @if ($f->link_berkas)
                        <a href="{{ $f->link_berkas }}" target="_blank" class="btn btn-sm btn-success">Lihat Berkas</a>
                    @else
                        <span class="text-danger">Belum diisi</span>
                    @endif
                </td>
                <td>
                    @if($f->surat_perjanjian)
                        <a href="{{ asset('storage/' . $f->surat_perjanjian) }}" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                    @else
                        <span class="text-muted">Belum diunggah</span>
                    @endif
                </td>
                <td>
                    {{ $f->status_formulir ?? 'Belum diverifikasi' }}
                    @if($f->status_info)
                        <br><small class="text-danger">{{ $f->status_info }}</small>
                    @endif
                </td>
                <td>
                    <form action="{{ route('formulir.verifikasi', ['id' => $f->id, 'status' => 'diterima']) }}" method="GET">
                        <button class="btn btn-sm btn-success mb-1">Terima</button>
                    </form>

                    <!-- Tombol buka modal tolak -->
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalTolak-{{ $f->id }}">
                        Tolak
                    </button>

                    <!-- Modal tolak -->
                    <div class="modal fade" id="modalTolak-{{ $f->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/admin/formulir/tolak/{{ $f->id }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tolak Formulir</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Alasan Penolakan</label>
                                        <input type="text" name="status_info" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger">Tolak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
