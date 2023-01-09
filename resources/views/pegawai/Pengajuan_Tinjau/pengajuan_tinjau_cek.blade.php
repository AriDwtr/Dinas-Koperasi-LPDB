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
                                <h4 class="header-title">Detail Data Masyarakat Pengajuan</h4>
                                <p class="card-title-desc">List Detail Data Masyarakat Yang Melakukan Pengajuan LPDB</p>
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                    </div>
                                    <div>
                                        <a href="{{ route('pegawai.pengajuan_terima', $data->id_pengajuan) }}" class="btn btn-primary btn-sm"><i
                                                class="mdi mdi-file-document-box-check-outline"></i> Terima Pengajuan</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target=".bs-example-modal-center"><i
                                                class="mdi mdi-file-excel-box-outline"></i> Tolak Pengajuan</button>
                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                            aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0">Tulis Alasan Penolakan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('pegawai.pengajuan_tolak') }}" method="post">
                                                            @csrf
                                                            @method('post')
                                                            <input type="text" name="id_pengajuan" value="{{ $data->id_pengajuan }}" id="" hidden>
                                                            <textarea name="alasan_tolak" class="form-control" id="" cols="30" rows="10" required></textarea>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm w-100 mt-3"><i
                                                                    class="mdi mdi-send-circle-outline"></i>
                                                                Penolakan</button>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#masyarakat" role="tab">
                                            <i class="mdi mdi-account-multiple-outline mr-1"></i> <span
                                                class="d-none d-md-inline-block">Profil Masyarakat</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#usaha" role="tab">
                                            <i class="mdi mdi-storefront mr-1"></i> <span
                                                class="d-none d-md-inline-block">Profil Usaha</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                                            <i class="mdi mdi-file-swap-outline mr-1"></i> <span
                                                class="d-none d-md-inline-block">Berkas Pengajuan</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3">
                                    <div class="tab-pane active" id="masyarakat" role="tabpanel">
                                        <h4 class="header-title">Profil Yang Mengajukan</h4>
                                        <p class="card-title-desc">Data Masyarakat Yang Melakukan Pengajuan Dana LPDB</p>

                                        <div class="media mb-2">
                                            <img class="d-flex align-self-start rounded mr-3"
                                                src="/profil/{{ $data->foto }}" alt="" height="200">
                                            <div class="media-body">
                                                <h5 class="font-size-15">Nomor Pengajuan : P /
                                                    {{ date('m', strtotime($data->created_at)) }} /
                                                    0{{ $data->id_pengajuan }}</h5>
                                                <p>Saya Bertanda Tangan Di Bawah ini Dengan Data Diri Lengkap Sebagai
                                                    Berikut : </p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Nomor Induk KTP</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::upper($data->nik) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Nama Lengkap</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::upper($data->nama) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Email</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::upper($data->email) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Tempat, Tanggal Lahir</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::title($data->tempat_lahir) . ', ' . date('d / F / Y', strtotime($data->tanggal_lahir)) }}"
                                                                disabled placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Jenis Kelamin</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ $data->gender == 'L' ? 'Laki - Laki' : 'Perempuan' }}"
                                                                disabled placeholder="Default input">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Kecamatan</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::upper($data->kecamatan) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Kelurahan</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::upper($data->kelurahan) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Kabupaten / Kota</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::upper($data->kota) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Provinsi</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::upper($data->provinsi) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="font-size-14">Nomor Telp</h5>
                                                    <input class="form-control" type="text"
                                                        value="{{ Str::upper($data->telp) }}" disabled
                                                        placeholder="Default input">
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="font-size-14">Alamat</h5>
                                                    <textarea name="" id="" class="form-control" cols="10" rows="5">{{ $data->alamat }}
                                                    </textarea>
                                                </div>
                                                <button class="btn btn-info btn-sm mt-1 mr-1" type="button"
                                                    data-toggle="collapse" data-target="#collapseExample"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat KTP {{ Str::upper($data->nama) }}
                                                </button>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body mt-3 mb-0">
                                                        <img src="/koperasi/ktp/{{ $data->ktp }}" class="img-fluid"
                                                            alt="Responsive image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="usaha" role="tabpanel">
                                        <h4 class="header-title">Profil Usaha Yang Di Ajukan</h4>
                                        <p class="card-title-desc">Data Usaha Yang Di Ajukan Oleh Masyarakat Untuk
                                            Mendapatkan Bantuan Dana Dari LPDB</p>

                                        <div class="media mb-2">
                                            <img class="d-flex align-self-start rounded mr-3"
                                                src="/koperasi/foto_usaha/{{ $data->foto_usaha }}" alt=""
                                                height="200">
                                            <div class="media-body">
                                                <h5 class="font-size-15">Nomor Pengajuan : P /
                                                    {{ date('m', strtotime($data->created_at)) }} /
                                                    0{{ $data->id_pengajuan }}</h5>
                                                <p>Detail Data Usaha Yang Melakukan Pengajuan Dana LPDB</p>
                                                <div class="mb-2">
                                                    <h5 class="font-size-14">Nama Usaha</h5>
                                                    <input class="form-control" type="text"
                                                        value="{{ Str::title($data->nama_usaha) }}" disabled
                                                        placeholder="Default input">
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="font-size-14">Jenis Usaha</h5>
                                                    <input class="form-control" type="text"
                                                        value="{{ Str::title($data->jenis_usaha) }}" disabled
                                                        placeholder="Default input">
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="font-size-14">Bentuk Usaha</h5>
                                                    <input class="form-control" type="text"
                                                        value="{{ Str::upper($data->bentuk_usaha) }}" disabled
                                                        placeholder="Default input">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Kecamatan Usaha</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::title($data->kecamatan_usaha) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Kelurahan Usaha</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::title($data->kelurahan_usaha) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Kabupaten / Kota Usaha</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::title($data->kota_usaha) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-2">
                                                            <h5 class="font-size-14">Provinsi Usaha</h5>
                                                            <input class="form-control" type="text"
                                                                value="{{ Str::title($data->provinsi_usaha) }}" disabled
                                                                placeholder="Default input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="font-size-14">Alamat Lengkap Usaha</h5>
                                                    <textarea name="" id="" class="form-control" cols="10" rows="5">{{ $data->alamat_usaha }}
                                                    </textarea>
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="font-size-14">No NPWP</h5>
                                                    <input class="form-control" type="text"
                                                        value="{{ Str::title($data->no_npwp) }}" disabled
                                                        placeholder="Default input">
                                                </div>
                                                <button class="btn btn-info btn-sm mt-1 mr-1" type="button"
                                                    data-toggle="collapse" data-target="#collapseExampleNPWP"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Foto NPWP
                                                </button>
                                                <div class="collapse" id="collapseExampleNPWP">
                                                    <div class="card card-body mt-3 mb-0">
                                                        <img src="/koperasi/npwp/{{ $data->npwp }}" class="img-fluid"
                                                            alt="Responsive image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="messages" role="tabpanel">
                                        <div id="accordion">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="m-0 font-size-14">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                    href="#collapsePermohonan" aria-expanded="true"
                                                                    aria-controls="collapsePermohonan" class="text-dark">
                                                                    Berkas Permohonan
                                                                </a>
                                                            </h5>
                                                        </div>

                                                        <div id="collapsePermohonan" class="collapse"
                                                            aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>
                                                                    <a href="{{ route('pegawai.download_permohonan', $data->id_pengajuan) }}"
                                                                        class="btn btn-primary btn-sm">Download Berkas
                                                                        Permohonan</a>
                                                                </p>
                                                                <iframe src="/koperasi/permohonan/{{ $data->permohonan }}"
                                                                    align="top" height="620" width="100%"
                                                                    frameborder="0" scrolling="auto"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="m-0 font-size-14">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                    href="#collapseProposal" aria-expanded="true"
                                                                    aria-controls="collapseProposal" class="text-dark">
                                                                    Berkas Proposal Usaha
                                                                </a>
                                                            </h5>
                                                        </div>

                                                        <div id="collapseProposal" class="collapse"
                                                            aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>
                                                                    <a href="{{ route('pegawai.download_proposal', $data->id_pengajuan) }}"
                                                                        class="btn btn-primary btn-sm">Download Berkas
                                                                        Proposal Usaha</a>
                                                                </p>
                                                                <iframe src="/koperasi/proposal/{{ $data->proposal }}"
                                                                    align="top" height="620" width="100%"
                                                                    frameborder="0" scrolling="auto"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="m-0 font-size-14">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                    href="#collapseAkta" aria-expanded="true"
                                                                    aria-controls="collapseAkta" class="text-dark">
                                                                    Berkas Akta Usaha
                                                                </a>
                                                            </h5>
                                                        </div>

                                                        <div id="collapseAkta" class="collapse"
                                                            aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>
                                                                    <a href="{{ route('pegawai.download_akta', $data->id_pengajuan) }}"
                                                                        class="btn btn-primary btn-sm">Download Berkas Akta
                                                                        Usaha</a>
                                                                </p>
                                                                <iframe src="/koperasi/akta/{{ $data->akta }}"
                                                                    align="top" height="620" width="100%"
                                                                    frameborder="0" scrolling="auto"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="m-0 font-size-14">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                    href="#collapseKeuangan" aria-expanded="true"
                                                                    aria-controls="collapseKeuangan" class="text-dark">
                                                                    Berkas Laporan Keuangan
                                                                </a>
                                                            </h5>
                                                        </div>

                                                        <div id="collapseKeuangan" class="collapse"
                                                            aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>
                                                                    <a href="{{ route('pegawai.download_keuangan', $data->id_pengajuan) }}"
                                                                        class="btn btn-primary btn-sm">Download Berkas
                                                                        Laporan Keuangan</a>
                                                                </p>
                                                                <iframe src="/koperasi/keuangan/{{ $data->keuangan }}"
                                                                    align="top" height="620" width="100%"
                                                                    frameborder="0" scrolling="auto"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="m-0 font-size-14">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                    href="#collapseLegalitas" aria-expanded="true"
                                                                    aria-controls="collapseLegalitas" class="text-dark">
                                                                    Berkas Legalitas Usaha
                                                                </a>
                                                            </h5>
                                                        </div>

                                                        <div id="collapseLegalitas" class="collapse"
                                                            aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>
                                                                    <a href="{{ route('pegawai.download_legalitas', $data->id_pengajuan) }}"
                                                                        class="btn btn-primary btn-sm">Download Berkas
                                                                        Legalitas Usaha</a>
                                                                </p>
                                                                <iframe src="/koperasi/legalitas/{{ $data->legalitas }}"
                                                                    align="top" height="620" width="100%"
                                                                    frameborder="0" scrolling="auto"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
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
