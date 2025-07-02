@extends('app._layout')
@section('konten')

<div class="container">
    <h4>Daftar Santri Diterima</h4>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Jenjang</th>
            <th>Input Hasil Seleksi</th>
        </tr>
        @foreach($santriDiterima as $santri)
        <tr>
            <td>{{ $santri->nama ?? 'Tidak ada nama' }}</td>
            <td>{{ $santri->jenjang ?? '-' }}</td>
            <td>
                <form action="{{ route('ketua-tpa.input-hasil', $santri->id) }}" method="POST">
                    @csrf
                    <textarea name="hasil_seleksi_tpa" rows="2" class="form-control">{{ $santri->hasil_seleksi_tpa }}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-1">Simpan</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
