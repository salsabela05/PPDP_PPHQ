@extends("app/_layout")
@section("konten")

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">FORMULIR PENDAFTARAN PENERIMAAN SANTRI BARU PONDOK PESANTREN HIDAYATUL QUR'AN</h3>
            <form action="/app/formulir/submit" method="post" enctype="multipart/form-data">
                @csrf

                <h4>IDENTITAS SANTRI</h4>
                <div class="mb-2">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ $formulir->nama ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Nama Panggilan</label>
                    <input type="text" name="nama_panggilan" class="form-control" value="{{ $formulir->nama_panggilan ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Tempat Tanggal Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $formulir->tempat_lahir ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control" value="{{ $formulir->jenis_kelamin ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" value="{{ $formulir->asal_sekolah ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Sekolah Saat Ini, Semester, Jurusan</label>
                    <input type="text" name="sekolah_saat_ini" class="form-control" value="{{ $formulir->sekolah_saat_ini ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ $formulir->nik ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $formulir->alamat ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Dusun</label>
                    <input type="text" name="dusun" class="form-control" value="{{ $formulir->dusun ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>RT/RW</label>
                    <input type="text" name="rt_rw" class="form-control" value="{{ $formulir->rt_rw ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Kelurahan/Desa</label>
                    <input type="text" name="kelurahan" class="form-control" value="{{ $formulir->kelurahan ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control" value="{{ $formulir->kode_pos ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="{{ $formulir->kecamatan ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Kabupaten/Kota</label>
                    <input type="text" name="kabupaten" class="form-control" value="{{ $formulir->kabupaten ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="{{ $formulir->provinsi ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>No. HP Orang Tua/Wali</label>
                    <input type="text" name="nohp_wali" class="form-control" value="{{ $formulir->nohp_wali ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>No. HP Santri</label>
                    <input type="text" name="nohp_santri" class="form-control" value="{{ $formulir->nohp_santri ?? '' }}" required>
                </div>

                <h4>DATA AYAH KANDUNG</h4>
                <div class="mb-2">
                    <label>Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" value="{{ $formulir->nama_ayah ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>NIK</label>
                    <input type="text" name="nik_ayah" class="form-control" value="{{ $formulir->nik_ayah ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ $formulir->pekerjaan_ayah ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Penghasilan</label>
                    <input type="text" name="penghasilan_ayah" class="form-control" value="{{ $formulir->penghasilan_ayah ?? '' }}" required>
                </div>

                <h4>DATA IBU KANDUNG</h4>
                <div class="mb-2">
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ $formulir->nama_ibu ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>NIK</label>
                    <input type="text" name="nik_ibu" class="form-control" value="{{ $formulir->nik_ibu ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ $formulir->pekerjaan_ibu ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Penghasilan</label>
                    <input type="text" name="penghasilan_ibu" class="form-control" value="{{ $formulir->penghasilan_ibu ?? '' }}" required>
                </div>

                <h4>DATA WALI</h4>
                <div class="mb-2">
                    <label>Nama Wali</label>
                    <input type="text" name="nama_wali" class="form-control" value="{{ $formulir->nama_wali ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>NIK</label>
                    <input type="text" name="nik_wali" class="form-control" value="{{ $formulir->nik_wali ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan_wali" class="form-control" value="{{ $formulir->pekerjaan_wali ?? '' }}" required>
                </div>
                <div class="mb-2">
                    <label>Penghasilan</label>
                    <input type="text" name="penghasilan_wali" class="form-control" value="{{ $formulir->penghasilan_wali ?? '' }}" required>
                </div>

                <div class="mb-2">
                    @if ($formulir->foto)
                    <img height="100" src="{{ url('storage/'.$formulir->foto) }}" alt=""> <br>
                    @endif
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="mb-2">
                    <button class="btn btn-primary w-100">Daftar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
