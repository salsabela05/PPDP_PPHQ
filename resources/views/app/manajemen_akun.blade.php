@extends("app/_layout")
@section("konten")

<div class="card">
    <div class="card-body">
        <h3>Manajemen Akun</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $index => $u)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $u->nama }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->level }}</td>
                        <td>
                            <form action="/app/manajemen-akun/reset" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $u->id }}">
                                <button class="btn btn-primary">Reset Password</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection