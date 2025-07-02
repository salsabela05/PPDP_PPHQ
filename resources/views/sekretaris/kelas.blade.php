@extends('app._layout')
@section('konten')

<div class="container">
    <h4>Daftar Pembagian Kelas</h4>
    @foreach($kelas as $nama_kelas => $daftar)
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                {{ $nama_kelas }}
                <a href="{{ route('sekretaris.kelas.cetak', $nama_kelas) }}" class="btn btn-light btn-sm float-right">Cetak Absensi</a>
            </div>
            <div class="card-body">
                <ul>
                    @foreach($daftar as $santri)
                        <li>{{ $santri->nama }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection
