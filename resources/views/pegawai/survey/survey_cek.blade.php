@extends('pegawai.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Jadwal Survey</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Jadwal Survey</li>
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
                            <h4 class="header-title">Jadwal Survey</h4>
                            <p class="card-title-desc">
                                Survey Lokasi Tempat Usaha / UMKM/ PT untuk Pengajuan Dana LPDB Sebagai Bahan Pertimbangan
                            </p>
                            {{-- <div class="alert alert-info" role="alert">
                                <form action="{{ route('pegawai.cek_survey') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group mb-4">
                                                <label>Masukan Jarak Tanggal Laporan</label>
                                                <input type="text"
                                                    class="form-control datepicker-here w-100 @error('tanggal_laporan')
                                                    is-invalid
                                                @enderror"
                                                    data-range="true" data-multiple-dates-separator=" - " data-language="en"
                                                    name="tanggal_laporan" />
                                                @error('tanggal_laporan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-4">
                                                <label>&nbsp;</label>
                                                <button type="submit" class="btn btn-primary w-100">Lihat
                                                    Survey</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            <a href="{{ route('pegawai.survey_usaha') }}" class="btn btn-info waves-effect waves-light mb-3"
                                style="color:white">Lihat Survey Yang Terjadwal</a>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No Pengajuan</th>
                                        <th>Nama Usaha</th>
                                        <th>Jenis Usaha</th>
                                        <th>Tanggal Survey</th>
                                        <th>Nama Yang Mengajukan</th>
                                        <th>Alamat Usaha</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($survey as $data)
                                        <tr>
                                            <td>Nomor : P / {{ date('m', strtotime($data->created_at)) }} /
                                                0{{ $data->id_pengajuan }}</td>
                                            <td><b>{{ Str::title($data->nama_usaha) }}</b></td>
                                            <td>{{ Str::title($data->jenis_usaha) }}</td>
                                            <td>{{ date('d / F / Y', strtotime($data->tanggal_survey)) }}</td>
                                            <td>{{ Str::upper($data->nama) }}</td>
                                            <td>
                                                {{ Str::title($data->alamat_usaha) . '. ' . Str::title($data->kota_usaha) . ', ' . Str::title($data->provinsi_usaha) }}
                                            </td>
                                            <td>
                                                @if ($data->status_survey == 'ditolak')
                                                    <span class="badge badge-danger">Di Tolak</span>
                                                @else
                                                    <span class="badge badge-primary">Di Terima</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="6" class="text-center"><b>Tidak Ada Jadwal Pemeriksaan
                                                    Lokasi</b></th>
                                        </tr>
                                    @endforelse
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
    <!-- end page-content-wrapper -->
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

    <!-- datepicker -->
    <link href="/template/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />

    <link href="/template/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('js')
    <!-- datepicker -->
    <script src="/template/dist/assets/libs/air-datepicker/js/datepicker.min.js"></script>
    <script src="/template/dist/assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

    <script src="/template/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/template/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

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

    <!-- Form Advanced init -->
    <script src="/template/dist/assets/js/pages/form-advanced.init.js"></script>
@endsection
