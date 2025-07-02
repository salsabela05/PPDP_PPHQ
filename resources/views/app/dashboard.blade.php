@extends("app/_layout")
@section("konten")

<h3>Halo, {{ Auth::user()->nama }}</h3>
<p>Selamat datang di Sistem Informasi Data Santri. anda login sebagai <b> {{ Auth::user()->level }}</b> </p>

@if (Auth::user()->level =='calon_santri')  
<div class="card p-4 mb-4" style="background-color: #f9f9f9; border: 1px solid #ddd;">
<h5>✨ Panduan Pendaftaran Mudah ✨</h5>
<ul>
    <li>1. Buka menu Formulir Pendaftaran dan isi data diri kamu dengan lengkap.</li>
    <li>2. Pastikan bahwa berkas yang diunggah sudah benar dan sesuai dengan persyaratan.</li>
    <li>3. Pastikan semua informasi sudah benar sebelum disimpan.</li>
    <li>4. Lanjutkan ke menu Upload Pembayaran untuk mengunggah bukti pembayaranmu.</li>
    <li>5. Pastikan untuk mengunduh dan mengupload surat perjanjian.</li>
</ul>

@endif

@if (Auth::user()->level !='calon_santri')    
<div class="row">
    <!-- Total Santri -->
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Santri</h5>
                <h2>{{ $totalSantri }}</h2>
            </div>
        </div>
    </div>

    <!-- Santri Baru -->
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Santri Baru</h5>
                <h2>{{ $santriBaru }}</h2>
            </div>
        </div>
    </div>

    <!-- Data Belum Lengkap -->
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5>Data Belum Lengkap</h5>
                <h2>{{ $dataBelumLengkap }}</h2>
            </div>
        </div>
    </div>

    <!-- Belum Bayar -->
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Belum Bayar</h5>
                <h2>{{ $belumBayar }}</h2>
            </div>
        </div>
    </div>
</div>

@endif
@endsection
