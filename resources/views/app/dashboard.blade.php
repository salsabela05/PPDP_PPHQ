@extends("app/_layout")
@section("konten")

<h3>Halo, {{ Auth::user()->nama }}</h3>
<p>Selamat datang di Sistem Informasi Data Santri. anda login sebagai <b> {{ Auth::user()->level }}</b> </p>

@if (Auth::user()->level =='calon_santri')  
<h5>tatacara untuk mendaftar</h5>
<ul>
    <li>1. mengakses formulir pendaftaran</li>
    <li>2. mengisi data yang sudah disediakan pada formulir</li>
    <li>3. mengupload bukti pembayaran pada menu upload pembayaran</li>
</ul>
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
