@extends("app/_layout")
@section("konten")

<div class="card">
    <div class="card-body">
        <h3>upload bukti pembayaran</h3>
        
        <form action="/app/pembayaran/submit" method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label>bukti pembayaran</label>
                <input type="file" name="bukti_pembayaran" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <div class="mb-2">
                <button class="btn btn-primary mb-0">upload</button>
            </div>
        </form>

        <h3 class="mt-4">riwayat pembayaran</h3>
        <table class="table">
            <tr>
                <th>no</th>
                <th>keterangan</th>
                <th>bukti</th>
                <th>status</th>
            </tr>
            <tr>
                <td>1</td>
                <td>ok</td>
                <td>bukti</td>
                <td>menunggu konfirmasi</td>
            </tr>
        </table> 
    </div>
</div>

@endsection