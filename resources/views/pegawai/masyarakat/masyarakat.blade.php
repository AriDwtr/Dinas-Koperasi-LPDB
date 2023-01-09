@extends('pegawai.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Data Masyarakat</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">/</li>
                        <li class="breadcrumb-item active">Data Masyarakat</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-primary mb-3" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h4 class="header-title">Data Masyarakat</h4>
                            <p class="card-title-desc">
                                Data Masyarakat Yang Mendaftar Di Dinas Koperasi SumseL Untuk Pengajuan Dana LPDB
                            </p>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nomor Induk KTP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Terdaftar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($masyarakat as $data)
                                        <tr>
                                            <td><b>{{ $data->nik }}</b></td>
                                            <td>{{ Str::title($data->nama) }}</td>
                                            <td>
                                                @if ($data->gender == 'L')
                                                    Laki - Laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>
                                                {{ $data->email }}
                                            </td>
                                            <td class="text-center">
                                                @if ($data->foto == null)
                                                    <img src="/profil/default.jpg" alt="" class="rounded avatar-xs">
                                                @else
                                                    <img src="/profil/{{ $data->foto }}" alt=""
                                                        class="rounded avatar-xs">
                                                @endif
                                            </td>
                                            <td>
                                                {{ date('d/F/Y', strtotime($data->created_at)) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('pegawai.masyarakat_detail', $data->id) }}"
                                                    style="color:blue"><i class="mdi mdi-folder-account-outline"></i>
                                                    Lihat Detail </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
@endsection

@section('css')
    <!-- DataTables -->
    <link href="/template/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/template/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/template/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
    <!-- Required datatable js -->
    <script src="/template/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/template/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/template/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/template/dist/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/template/dist/assets/libs/jszip/jszip.min.js"></script>
    <script src="/template/dist/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/template/dist/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="/template/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/template/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/template/dist/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="/template/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/template/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="/template/dist/assets/js/pages/datatables.init.js"></script>
@endsection
