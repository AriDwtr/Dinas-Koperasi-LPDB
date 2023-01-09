@extends('pegawai.layouts.master')

@section('konten')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Detail Data Masyarakat</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('pegawai.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">/</li>
                    <li class="breadcrumb-item active">Detail Data Masyarakat</li>
                </ol>
            </div>
        </div>

    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="rounded-circle avatar-lg" alt="200x200" src="/profil/{{ $data1->foto }}" data-holder-rendered="true">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="rounded" style="height:200px;width:200px" alt="200x200" src="/koperasi/ktp/{{ $data2->ktp }}" data-holder-rendered="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Detail Data Masyarakat</h4>
                        <form action="" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nomor Induk
                                Keluarga</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                    id="validationCustom03" type="number" name="nik"
                                    value="{{ $data2->nik }}" placeholder="Nomor Induk Keluarga ( NIK KTP )" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nama Lengkap</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                    id="validationCustom03" type="text" name="nama"
                                    value="{{ $data2->nama }}" placeholder="Nama Lengkap" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Tempat, Tanggal
                                Lahir</label>
                            <div class="col-md-5">
                                <input class="form-control"
                                    id="validationCustom03" type="text" name="tempat"
                                    value="{{ $data2->tempat_lahir }}" placeholder="Tempat Lahir">
                            </div>
                            <div class="col-md-5">
                                <input class="form-control"
                                    id="validationCustom03" type="date" name="tgl_lahir"
                                    value="{{ $data2->tanggal_lahir }}" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                                <select class="custom-select" name="gender" disabled>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ $data2->gender == 'L' ? 'selected' : '' }}>Laki -
                                        Laki / Male </option>
                                    <option value="P" {{ $data2->gender == 'P' ? 'selected' : '' }}>Perempuan
                                        / Woman</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nomor Telpon</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                    id="validationCustom03" type="number" name="telp"
                                    value="{{ $data2->telp }}" placeholder="Nomor Telpon" readonly>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Provinsi </label>
                            <div class="col-md-10">
                                <input class="form-control @error('provinsi') is-invalid @enderror"
                                    id="validationCustom03" type="text" name="provinsi"
                                    value="{{ $data2->provinsi }}" placeholder="SUMATERA SELATAN, JAWA TENGAH" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Kota / Kabupaten
                            </label>
                            <div class="col-md-10">
                                <input class="form-control"
                                    id="validationCustom03" type="text" name="kota"
                                    value="{{ $data2->kota }}"
                                    placeholder="Palembang, Musi Banyuasin, Surabaya" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Kecamatan </label>
                            <div class="col-md-10">
                                <input class="form-control"
                                    id="validationCustom03" type="text" name="kecamatan"
                                    value="{{ $data2->kecamatan }}" placeholder="Kecamatan / Desa" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Kelurahan </label>
                            <div class="col-md-10">
                                <input class="form-control "
                                    id="validationCustom03" type="text" name="kelurahan"
                                    value="{{ $data2->kelurahan }}" placeholder="Kelurahan / Desa" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Alamat Lengkap</label>
                            <div class="col-md-10">
                                <textarea name="alamat" class="form-control" disabled>{{ $data2->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="{{ route('pegawai.masyarakat') }}" class="btn btn-info w-100"><- Kembali Ke Menu Utama</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
</div>
@endsection
