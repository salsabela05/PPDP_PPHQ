@extends("app/_layout")
@section("konten")

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">FORMULIR PENDAFTARAN PENERIMAAN SANTRI BARU<br>PONDOK PESANTREN HIDAYATUL QUR'AN</h3>

            {{-- FORM PENDAFTARAN --}}
            <form action="/app/formulir/submit" method="post" enctype="multipart/form-data">
                @csrf

                {{-- PILIH JENJANG --}}
                <div class="mb-2">
                    <label>Pilihan Jenjang</label>
                    <select name="jenjang" class="form-control" required>
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="umum" {{ (old('jenjang', strtolower($formulir->jenjang ?? '')) == 'umum') ? 'selected' : '' }}>Umum</option>
                        <option value="tahfidz" {{ (old('jenjang', strtolower($formulir->jenjang ?? '')) == 'tahfidz') ? 'selected' : '' }}>Tahfidz</option>
                    </select>
                </div>

                {{-- IDENTITAS SANTRI --}}
                <h4>IDENTITAS SANTRI</h4>
                @foreach ([
                    'nama' => 'Nama Lengkap',
                    'nama_panggilan' => 'Nama Panggilan',
                    'tempat_lahir' => 'Tempat Tanggal Lahir',
                    'jenis_kelamin' => 'Jenis Kelamin',
                    'asal_sekolah' => 'Asal Sekolah',
                    'sekolah_saat_ini' => 'Sekolah Saat Ini, Semester, Jurusan',
                    'nik' => 'NIK',
                    'alamat' => 'Alamat',
                    'dusun' => 'Dusun',
                    'rt_rw' => 'RT/RW',
                    'kelurahan' => 'Kelurahan/Desa',
                    'kode_pos' => 'Kode Pos',
                    'kecamatan' => 'Kecamatan',
                    'kabupaten' => 'Kabupaten/Kota',
                    'provinsi' => 'Provinsi',
                    'nohp_wali' => 'No. HP Orang Tua/Wali',
                    'nohp_santri' => 'No. HP Santri',
                ] as $field => $label)
                    <div class="mb-2">
                        <label>{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="form-control" value="{{ $formulir->$field ?? '' }}" required>
                    </div>
                @endforeach

                {{-- DATA AYAH --}}
                <h4>DATA AYAH KANDUNG</h4>
                @foreach ([
                    'nama_ayah' => 'Nama Ayah',
                    'nik_ayah' => 'NIK',
                    'pekerjaan_ayah' => 'Pekerjaan',
                    'penghasilan_ayah' => 'Penghasilan',
                ] as $field => $label)
                    <div class="mb-2">
                        <label>{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="form-control" value="{{ $formulir->$field ?? '' }}" required>
                    </div>
                @endforeach

                {{-- DATA IBU --}}
                <h4>DATA IBU KANDUNG</h4>
                @foreach ([
                    'nama_ibu' => 'Nama Ibu',
                    'nik_ibu' => 'NIK',
                    'pekerjaan_ibu' => 'Pekerjaan',
                    'penghasilan_ibu' => 'Penghasilan',
                ] as $field => $label)
                    <div class="mb-2">
                        <label>{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="form-control" value="{{ $formulir->$field ?? '' }}" required>
                    </div>
                @endforeach

                {{-- DATA WALI --}}
                <h4>DATA WALI</h4>
                @foreach ([
                    'nama_wali' => 'Nama Wali',
                    'nik_wali' => 'NIK',
                    'pekerjaan_wali' => 'Pekerjaan',
                    'penghasilan_wali' => 'Penghasilan',
                ] as $field => $label)
                    <div class="mb-2">
                        <label>{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="form-control" value="{{ $formulir->$field ?? '' }}" required>
                    </div>
                @endforeach

                {{-- LINK BERKAS --}}
                <div class="mb-2">
                    <label>Link Berkas Google Drive (KK, Akta, Ijazah, dll)</label>
                    <input type="url" name="link_berkas" class="form-control" placeholder="https://drive.google.com/..." value="{{ $formulir->link_berkas ?? '' }}" required>
                </div>

                {{-- FOTO --}}
                <div class="mb-2">
                    @if ($formulir && $formulir->foto)
                        <img height="100" src="{{ url('storage/'.$formulir->foto) }}" alt=""> <br>
                    @endif
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="mb-2">
                    <button class="btn btn-primary w-100">Daftar</button>
                </div>
            </form>

            {{-- SURAT PERJANJIAN --}}
            <hr>
            <h4>Surat Perjanjian</h4>
            <p>Silakan unduh, tanda tangani, lalu unggah kembali surat perjanjian berikut.</p>
            <a href="{{ asset('template/surat_perjanjian.pdf') }}" class="btn btn-success" download>📄 Unduh Surat</a>

            <form action="{{ route('formulir.uploadSurat') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="surat_perjanjian" class="form-label">Unggah Surat Perjanjian (PDF):</label>
                    <input type="file" name="surat_perjanjian" class="form-control" accept="application/pdf">
                </div>
                <button type="submit" class="btn btn-primary">Unggah</button>
            </form>

            @if ($formulir && $formulir->surat_perjanjian)
                <p class="mt-3">📂 <a href="{{ asset('storage/' . $formulir->surat_perjanjian) }}" target="_blank">Lihat surat yang sudah diunggah</a></p>
            @endif

            {{-- STATUS FORMULIR DAN RINCIAN BIAYA --}}
            @if ($formulir)
                @if ($formulir->status_formulir == 'diterima')
                    <h4>Rincian Biaya</h4>

                    @if (strtolower($formulir->jenjang) == 'tahfidz')
                        @include('partials.rincian_tahfidz')
                    @elseif (strtolower($formulir->jenjang) == 'umum')
                        @include('partials.rincian_umum')
                    @endif
                @elseif ($formulir->status_formulir == 'ditolak')
                    <div class="alert alert-danger">Formulir Anda ditolak. Silakan periksa kembali berkas Anda.</div>
                @else
                    <div class="alert alert-info">Menunggu verifikasi formulir dari panitia.</div>
                    <strong>Rincian biaya akan muncul setelah panitia mengonfirmasi berkas persyaratan.</strong>
                @endif
            @endif

        </div>
    </div>
</div>

@endsection
