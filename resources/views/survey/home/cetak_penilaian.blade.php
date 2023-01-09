@extends('survey.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box noprint">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Cetak Lembar Penilaian</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('survey.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lembar Penilaian</li>
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
                                            <p style="color: #7e8d9f;font-size: 20px;">No. Pengajuan >> <strong>ID:
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
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <p class="ms-3">Form Penilaian Kesesuaian Usaha Sebagai Penerima Bantuan
                                                    Dana LPDB</p>
                                                <textarea name="" class="form-control" id="" cols="5" rows="5"></textarea>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Layak Menerima Bantuan Pendanaan
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                       Tidak Layak Menerima Bantuan
                                                    </label>
                                                </div>
                                                <hr>
                                                <h5>Cek Kelengkapan Dokumen Asli</h5>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                       Permohonan Pengajuan
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                       Proposal Usaha
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                       Akta Usaha
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                       Laporan Keuangan Usaha
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                       Legalitas Usaha
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
