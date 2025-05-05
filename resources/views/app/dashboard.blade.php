@extends("app/_layout")
@section("konten")

<h3>Halo, {{ Auth::user()->nama }}</h3>
<p>Selamat datang di Sistem Informasi Data Santri. anda login sebagai <b> {{ Auth::user()->level }}</b> </p>

@if (Auth::user()->level =='calon_santri')  
<h5>✨ Panduan Pendaftaran Mudah ✨</h5>
<ul>
    <li>1. Buka menu Formulir Pendaftaran dan isi data diri kamu dengan lengkap.</li>
    <li>2. Pastikan semua informasi sudah benar sebelum disimpan.</li>
    <li>3. Lanjutkan ke menu Upload Pembayaran untuk mengunggah bukti pembayaranmu.</li>
</ul>

<h5>📢 Setelah berhasil mendaftar, harap membawa berkas persyaratan ke pondok:</h5>
<ul>
    <li>Fotocopy ijazah atau surat keterangan lulus yang telah dilegalisir (3 lembar)</li>
    <li>Fotocopy kartu keluarga (3 lembar)</li>
    <li>Fotocopy akta kelahiran (3 lembar)</li>
    <li>Fotocopy KTP orang tua (3 lembar)</li>
    <li>Fotocopy KIP (3 lembar)</li>
    <li>Fotocopy piagam prestasi (3 lembar, jika ada)</li>
</ul>

<h5>Apabila ada pertanyaan atau kendala, silakan menghubungi admin. Semoga proses pendaftaran berjalan lancar, dan kami nantikan kehadiran Anda di pondok!</h5>
@endif

@if (Auth::user()->level !='calon_santri')    
<div class="row">
    <!-- Total Santri -->
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Santri</h5>
                <h2>150</h2>
            </div>
        </div>
    </div>

    <!-- Santri Baru -->
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Santri Baru</h5>
                <h2>10</h2>
            </div>
        </div>
    </div>

    <!-- Santri Belum Melengkapi Data -->
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5>Data Belum Lengkap</h5>
                <h2>5</h2>
            </div>
        </div>
    </div>

    <!-- Santri Belum Bayar -->
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Belum Bayar</h5>
                <h2>8</h2>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
