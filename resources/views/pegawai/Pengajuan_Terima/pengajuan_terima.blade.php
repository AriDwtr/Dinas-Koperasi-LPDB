@extends('pegawai.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Data Pengajuan Yang Telah Di Terima dan Lolos Verifikasi Berkas</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">/</li>
                        <li class="breadcrumb-item active">Data Pengajuan Yang Telah Di Terima dan Lolos Verifikasi Berkas</li>
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
                            <h4 class="header-title">Data Pengajuan Yang Telah Di Terima dan Lolos Verifikasi Berkas</h4>
                            <p class="card-title-desc">
                                Data Pengajuan yang lolos verifikasi berkas dan selanjutnya pembuatan jadwal survey ke lokasi usaha
                            </p>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No Pengajuan</th>
                                        <th>Nama Usaha</th>
                                        <th>Jenis Usaha</th>
                                        <th>Nama Pemilik</th>
                                        <th>Status</th>
                                        <th>Tanggal Diterima Pengajuan</th>
                                        <th>Buat Jadwal</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($pengajuan as $data)
                                        <tr>
                                            <td>Nomor : P / {{ date('m', strtotime($data->created_at)) }} /
                                                0{{ $data->id_pengajuan }}</td>
                                            <td><b>{{ Str::title($data->nama_usaha) }}</b></td>
                                            <td>{{ Str::title($data->jenis_usaha) }}</td>
                                            <td>
                                                {{  Str::title($data->nama)  }}
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">Belum Ada Jadwal</span>
                                            </td>
                                            <td>
                                                {{ date('d-F-Y', strtotime($data->updated_at)) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('pegawai.pengajuan_diterima_create', $data->id_pengajuan) }}"
                                                    style="color:green"><i class="mdi mdi-car-multiple"></i>
                                                    Buat Jadwal Survey</a>
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
