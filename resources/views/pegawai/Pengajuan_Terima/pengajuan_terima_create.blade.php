@extends('pegawai.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Data Pengajuan</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">/</li>
                        <li class="breadcrumb-item active">Data Pengajuan</li>
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
                    @foreach ($pengajuan as $data)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Jadwal Survey Lokasi Usaha {{ Str::title($data->nama_usaha) }}</h4>
                                <p class="card-title-desc">Detail Pengajuan Yang akan Di Lakukan Survey</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="40%">No. Pengajuan</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%"><b>P / {{ date('m', strtotime($data->created_at)) }}
                                                            /
                                                            0{{ $data->id_pengajuan }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Nama Usaha / Perusahaan</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%"><b>{{ Str::title($data->nama_usaha) }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Jenis Usaha / Bentuk Usaha</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%"><b>{{ Str::title($data->jenis_usaha) }} /
                                                            {{ Str::upper($data->bentuk_usaha) }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">NIK Yang Mengajukan</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%"><b>{{ Str::title($data->nik) }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Nama Yang Mengajukan</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%"><b>{{ Str::title($data->nama) }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Tempat, Tanggal Lahir</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%">
                                                        <b>{{ Str::title($data->tempat_lahir) . ', ' . date('d / F / Y', strtotime($data->tanggal_lahir)) }}</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Yang Mengajukan</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%"><img src="/profil/{{ $data->foto }}"
                                                            alt="" height="100" width="100"></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Usaha</td>
                                                    <td width="20%" class="text-center"> : </td>
                                                    <td width="40%"><img
                                                            src="/koperasi/foto_usaha/{{ $data->foto_usaha }}"
                                                            alt="" height="100" width="100"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('pegawai.pengajuan_diterima_store') }}" method="post">
                                            @csrf
                                            @method('post')
                                            <h5 class="header-title">Tanggal Survey Lokasi Usaha Calon Penerima Bantuan Dana
                                                LPDB</h5>
                                            <div class="form-group mb-4">
                                                <label>Piih Tanggal Survey Lokasi Usaha</label>
                                                <input type="text" name="id_pengajuan" value="{{ $data->id_pengajuan }}"
                                                    id="" hidden>
                                                <input type="text" name="id_user" value="{{ $data->id_user }}"
                                                    id="" hidden>
                                                {{-- <input type="text" class="form-control datepicker-here" data-language="en" /> --}}
                                                @if ($tanggal_survey == null)
                                                    <input type="date"
                                                        class="form-control @error('jadwal_survey')
                                            is-invalid
                                        @enderror"
                                                        name="jadwal_survey"
                                                        min="{{ date('Y-m-d', strtotime("+1 day")) }}" />
                                                    @error('jadwal_survey')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                @else
                                                    <input type="date"
                                                        class="form-control @error('jadwal_survey')
                                            is-invalid
                                        @enderror"
                                                        name="jadwal_survey"
                                                        min="{{ date('Y-m-d', strtotime('+1 days', strtotime($tanggal_survey->tanggal_survey))) }}" />
                                                    @error('jadwal_survey')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100"><i
                                                    class="mdi mdi-alarm-note"></i> Posting Jadwal Survey</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
@endsection

@section('css')
    <!-- datepicker -->
    <link href="/template/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('js')
    <!-- datepicker -->
    <script src="/template/dist/assets/libs/air-datepicker/js/datepicker.min.js"></script>
    <script src="/template/dist/assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

    <!-- Form Advanced init -->
    <script src="/template/dist/assets/js/pages/form-advanced.init.js"></script>
@endsection
