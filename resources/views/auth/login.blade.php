<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dinas Koperasi | Pengajuan LPDB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/koperasi/logo.png">

    <!-- Bootstrap Css -->
    <link href="/template/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/template/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/template/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern">
    <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <a href="index.html" class="logo"><img src="/koperasi/logo.png" height="80"
                                alt="logo"></a>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Login untuk Masuk Sistem Informasi Pengajuan LPDB</h5>
                                @if (session('error'))
                                <div class="alert alert-danger mb-3" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}"
                                                    autocomplete="email" required autofocus>
                                                <label for="userpassword">Email Akun</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group form-group-custom mb-4">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">
                                                <label for="userpassword">Sandi Akun</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary btn-block waves-effect waves-light"
                                                    type="submit">Masuk Akun</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <a href="{{ route('register') }}" class="text-muted"><i
                                                        class="mdi mdi-account-circle mr-1"></i> Buat Akun Baru</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="/template/dist/assets/libs/jquery/jquery.min.js"></script>
    <script src="/template/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/template/dist/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/template/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/template/dist/assets/libs/node-waves/waves.min.js"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <script src="/template/dist/assets/js/app.js"></script>

</body>

</html>
