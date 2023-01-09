<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dinas Koperasi Palembang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/koperasi/logo.png">
    <!-- css -->
    <link href="/HTML/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/HTML/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="/HTML/css/style.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark" id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo" href="layout-one-1.html">
                <img src="/koperasi/logo.png" alt="" class="logo-dark" height="50" />
                <img src="/koperasi/logo.png" alt="" class="logo-light" height="50" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto navbar-center" id="navbar-navlist">
                    <li class="nav-item">
                        <a data-scroll href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#pengajuan" class="nav-link">Tata Cara Pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="#features" class="nav-link">Keunggulan</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-center">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->type == "masyarakat")
                            <li class="nav-item">
                                <a href="{{ route('masyakarat.home') }}" class="nav-link">Dashboard</a>
                            </li>
                            @elseif (Auth::user()->type == "pegawai")
                            <li class="nav-item">
                                <a href="{{ route('pegawai.home') }}" class="nav-link">Dashboard</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('survey.home') }}" class="nav-link">Dashboard</a>
                            </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section class="hero-1-bg" style="background-image: url(/HTML/images/hero-1-bg-img.png)" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h1 class="hero-1-title text-dark fw-bold text-shadow mb-4">Selamat Datang Di LPDB Dinas Koperasi
                        Kota Palembang</h1>
                    <div class="w-75 mb-5 mb-lg-0">
                        <p class="text-muted mb-5 pb-5 font-size-17">Pengajuan Dana LPDB untuk UMKM / CV / PT Lebih
                            Mudah dan Cepat</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class=" mt-5 mt-lg-0">
                        <img src="/HTML/images/hero-1-img.png" alt="" class="img-fluid d-block mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Why Choose Us Start -->
    <section class="section" id="pengajuan">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="mb-4 mb-lg-0">
                        <div class="p-2 bg-soft-primary d-inline-block rounded mb-4">
                            <img src="/koperasi/lpdb.jpeg" alt="" height="60">
                        </div>
                        <h3 class="">Tata Cara Pengajuan ?</h3>
                        <p class="text-muted mb-4">Tata Cara Pengajuan Dana LPDB Cukup Mudah dan Cepat Dengan Syarat
                            Sebagai Berikut</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wc-box rounded text-center wc-box-success p-4">
                                <div class="wc-box-icon">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <h5 class="fw-bold mb-2 wc-title mt-4">Pendaftaraan</h5>
                                <p class="text-muted mb-0 font-size-15 wc-subtitle">Lakukan Pendaftaraan Akun Sesuai
                                    dengan Identitas Asli Anda</p>
                            </div>
                            <div class="wc-box rounded text-center wc-box-success p-4">
                                <div class="wc-box-icon">
                                    <i class="mdi mdi-card-account-details-star-outline"></i>
                                </div>
                                <h5 class="fw-bold mb-2 wc-title mt-4">Lengkapi Identitas</h5>
                                <p class="text-muted mb-0 font-size-15 wc-subtitle">Lengkapi Identitas anda Sesuai KTP
                                    di Dalam Sistem Anda</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wc-box rounded text-center wc-box-success p-4">
                                <div class="wc-box-icon">
                                    <i class="mdi mdi-clipboard-text"></i>
                                </div>
                                <h5 class="fw-bold mb-2 wc-title mt-4">Form Pengajuan Dana Usaha</h5>
                                <p class="text-muted mb-0 font-size-15 wc-subtitle">Upload permohonan,proposal,laporan
                                    keuangan,legalitas,akta usaha</p>
                            </div>
                            <div class="wc-box rounded text-center wc-box-success p-4">
                                <div class="wc-box-icon">
                                    <i class="mdi mdi-database-lock"></i>
                                </div>
                                <h5 class="fw-bold mb-2 wc-title mt-4">Pengajuan Di Terima</h5>
                                <p class="text-muted mb-0 font-size-15 wc-subtitle">Pengajuan Anda Akan Di Nilai Sesuai
                                    Dengan Kriteria dan Standar yang Ada</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us End -->

    <!-- Features Start -->
    <section class="section bg-light feather-bg-img" style="background-image: url(/HTML/images/features-bg-img.png);"
        id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <h3 class="title mb-3">Keunggulan</h3>
                        <p class="text-muted font-size-15">Dengan Pengajuan LPDB Pada Website Dapat Mempermudah
                            Penilaian dan Mempercepat Approve Pengajuan</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mb-4 mb-lg-0">
                        <img src="/HTML/images/features-img.png" alt="" class="img-fluid d-block mx-auto">
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <p class="font-weight-medium text-uppercase mb-2"><i
                            class="mdi mdi-chart-bubble h2 text-primary me-1 align-middle"></i> Cepat dan Efisien</p>
                    <h3 class="font-weight-semibold line-height-1_4 mb-4">Membangun <b>Komunitas</b> & <b>Membantu</b>
                        Untuk Berkembang <b> Bagi Para Pelaku UMKM dan Usaha Lainnya</b></h3>
                    <p class="text-muted font-size-15 mb-4">LPDB Dinas Koperasi Kota Palembang Berupaya Membangun Minat
                        Bagi Para UMKM untuk Meningkatkan Produk Sesuai Dengan UUD Untuk Me-Sejahterakan Rakyat Dalam
                        Bidang Industri</p>
                </div>
            </div>
        </div>
    </section>


    <!-- javascript -->
    <script src="/HTML/js/bootstrap.bundle.min.js"></script>
    <script src="/HTML/js/smooth-scroll.polyfills.min.js"></script>
    <script src="/HTML/js/gumshoe.polyfills.min.js"></script>
    <!-- feather icon -->
    <script src="/HTML/js/feather.js"></script>
    <!-- unicons icon -->
    <script src="/HTML/js/unicons.js"></script>
    <!-- Main Js -->
    <script src="/HTML/js/app.js"></script>

</body>

</html>
