@extends('masyarakat.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box noprint">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Surat Keputusan Sementara</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('masyakarat.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Surat Keputusan Sementara</li>
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
                    @foreach ($survey as $data)
                        <div class="card">
                            <div class="card-body">
                                <div class="container mb-5 mt-3">
                                    <div class="row d-flex align-items-baseline">
                                        <div class="col-xl-9">
                                            <p style="color: #7e8d9f;font-size: 20px;">Nomor Surat <strong>:
                                                    P / {{ date('m', strtotime($data->created_at)) }} /
                                                    0{{ $data->id_pengajuan }}</strong></p>
                                        </div>
                                        <div class="col-xl-3 float-end">
                                            <button onClick="window.print();" class="btn btn-light text-capitalize border-0 noprint"
                                                data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i>
                                                Cetak</button>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="container">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <img src="/koperasi/logo.png" height="80px" alt="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <ul class="list-unstyled">
                                                    <li class="text-muted">NIK: <span
                                                            style="color:#8f8061 ;">{{ Str::title($data->nik) }}</span></li>
                                                    <li class="text-muted">Kepada: <span
                                                            style="color:#8f8061 ;">{{ Str::title($data->nama) }}</span>
                                                    </li>
                                                    <li class="text-muted">{{ $data->alamat }}</li>
                                                    <li class="text-muted">{{ $data->kota . ', ' . $data->provinsi }}</li>
                                                    <li class="text-muted"><i class="fas fa-phone"></i> {{ $data->telp }}
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <div class="col-xl-4">
                                                <p class="text-muted">Tempat Usaha</p>
                                                <ul class="list-unstyled">
                                                    <li class="text-muted"><i class="fas fa-circle"
                                                            style="color:green ;"></i> <span
                                                            class="fw-bold"></span>{{ Str::upper($data->nama_usaha) }}</li>
                                                    <li class="text-muted"><i class="fas fa-circle"
                                                            style="color:green ;"></i> <span class="fw-bold">Creation
                                                            Date: </span>Jun 23,2021</li>
                                                    <li class="text-muted"><i class="fas fa-circle"
                                                            style="color:green;"></i> <span
                                                            class="me-1 fw-bold">Status:</span><span
                                                            class="badge bg-warning text-black fw-bold">
                                                            Unpaid</span></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <div class="row my-2 mx-1 justify-content-center">
                                            <div class="col-md-2 mb-4 mb-md-0">
                                                <div class="
                                        bg-image
                                        ripple
                                        rounded-5
                                        mb-4
                                        overflow-hidden
                                        d-block
                                        "
                                                    data-ripple-color="light">
                                                    <img src="/koperasi/foto_usaha/{{ $data->foto_usaha }}" class="w-100"
                                                        height="100px" alt="Elegant shoes and shirt" />
                                                    <a href="#!">
                                                        <div class="hover-overlay">
                                                            <div class="mask"
                                                                style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-7 mb-4 mb-md-0">
                                                <p class="fw-bold">{{ Str::title($data->nama_usaha) }}</p>
                                                <p class="mb-1">
                                                    <span class="text-muted me-2">Jenis Usaha :</span><span>
                                                        {{ Str::title($data->jenis_usaha) }}</span>
                                                </p>
                                                <p>
                                                    <span class="text-muted me-2">Bentuk Usaha :</span><span>
                                                        {{ Str::upper($data->bentuk_usaha) }}</span>
                                                </p>
                                            </div>
                                            <div class="col-md-3 mb-4 mb-md-0">
                                                <p class="text-muted">{{ $data->alamat_usaha }}<br>
                                                    {{ $data->kota_usaha . ', ' . $data->provinsi_usaha }}
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>
                                            Menyatakan Bahwa <b>{{ Str::title($data->nama_usaha) }}</b> yang Telah Dilakukan Pemeriksaan / Survey di
                                            Lokasi Yang Beralamat {{ $data->alamat_usaha }}  {{ $data->kota_usaha . ', ' . $data->provinsi_usaha }} Dinyatakan <span class="badge badge-success">Lolos</span>
                                            untuk Sebagai Penerima Dana Bantuan LPDB di harapkan untuk segera membawa berkas - berkas di bawah ini ke kantor Dinas Koperasi Kota Palembang
                                            <li>Sk Sementara di Cetak</li>
                                            <li>Surat Permohonan di Cetak</li>
                                            <li>Proposal Usaha Di Cetak</li>
                                            <li>Legalitas Usaha Di Cetak</li>
                                            <li>Akta Usaha Di Cetak</li>
                                            <li>Laporan Keuangan Di Cetak</li>
                                            <hr>
                                            <li>KTP Asli Atas Nama <b>{{ $data->nama }}</b></li>
                                            <li>NPWP Asli Atas Nama <b>{{ $data->nama }}</b></li>
                                            <li>Buku Tabungan dan Rekening Aktif (Pilih Salah Satu : BRI,BNI,BTN,MANDIRI)</li>
                                        </p>
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
