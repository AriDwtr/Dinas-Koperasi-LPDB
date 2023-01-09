@extends('masyarakat.layouts.master')

@section('konten')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Dashboard</h4>
            </div>
        </div>

    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5>Selamat Datang, {{ Str::title(Auth::user()->nama) }}</h5>
                                <p class="text-muted">Sistem Pengajuan Dana LPDB</p>
                            </div>

                            <div class="col-5 ml-auto">
                                <div>
                                    <img src="/template/dist/assets/images/widget-img.png" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <img src="/koperasi/berkas.jpg" alt="" height="300px" width="100%">
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <img src="/koperasi/alurpeminjaman.jpeg" height="400px" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
</div>
<!-- end page-content-wrapper -->
@endsection
