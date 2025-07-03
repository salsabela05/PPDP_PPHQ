<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/assets/images/LOGO PPHQ.png">
    <title>Register</title>
    <link href="/admin/dist/css/style.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <!-- PERUBAHAN: Tambahkan style untuk naikkan posisi form -->
        <div class="auth-wrapper d-flex no-block justify-content-center bg-dark"
            style="align-items: flex-start !important; padding-top: 0px !important; min-height: 100vh;"> <!-- DITAMBAHKAN -->
            <div class="auth-box bg-secondary border-top border-secondary"> <!-- DITAMBAHKAN -->
                <div>
                    <form class="form-horizontal m-t-20" action="/register/submit" method="post">
                        @csrf
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/logo_pphq.png') }}" alt="Logo Pondok" style="max-width: 70px; height: auto;">
                                </div>
                                <h3 class="text-center text-white">Registrasi Untuk Calon Santri</h3>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap" aria-label="nama" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Alamat Email" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                   <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-block btn-lg btn-info mb-2" type="submit">Sign Up</button>
                                        <a href="/login" class="text-light">sudah memiliki akun? klik disini untuk login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
    </script>
</body>

</html>
