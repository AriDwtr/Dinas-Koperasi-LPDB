@extends('masyarakat.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Data Diri</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('masyakarat.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">/</li>
                        <li class="breadcrumb-item active">Data Diri</li>
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
                            <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ session('success') }}</strong>
                            </div>
                            @endif
                            @error('filektp')
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('filefoto')
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <h4 class="header-title">Data Diri</h4>
                            <p class="card-title-desc">Lengkapi Data Diri Sesuai Dengan Kartu Indentitas Diri (KTP)
                                Untuk Proses
                                Verifikasi Berkas Pengajuan Dana
                                Lembaga Pengelola Dana Bergulir Koperasi (LPDB) Dinas Koperasi Sumsel
                            </p>
                            <form action="{{ Route('masyakarat.diri_update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nomor Induk
                                        Keluarga</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('nik') is-invalid @enderror"
                                            id="validationCustom03" type="number" name="nik"
                                            value="{{ $detail->nik == null ? old('nik') :  $detail->nik }}" placeholder="Nomor Induk Keluarga ( NIK KTP )">
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('nama') is-invalid @enderror"
                                            id="validationCustom03" type="text" name="nama"
                                            value="{{ Auth::user()->nama == null ? old('nama') : Auth::user()->nama }}" placeholder="Nama Lengkap">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Tempat, Tanggal
                                        Lahir</label>
                                    <div class="col-md-5">
                                        <input class="form-control @error('tempat') is-invalid @enderror"
                                            id="validationCustom03" type="text" name="tempat"
                                            value="{{ $detail->tempat_lahir == null ? old('tempat') : $detail->tempat_lahir  }}" placeholder="Tempat Lahir">
                                        @error('tempat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <input class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            id="validationCustom03" type="date" name="tgl_lahir"
                                            value="{{ $detail->tanggal_lahir == null ? old('tgl_lahir') : $detail->tanggal_lahir }}" placeholder="Tanggal Lahir">
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-10">
                                        <select class="custom-select @error('gender') is-invalid @enderror" name="gender">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" {{ $detail->gender == 'L' ? 'selected' : '' }}>Laki -
                                                Laki / Male </option>
                                            <option value="P" {{ $detail->gender == 'P' ? 'selected' : '' }}>Perempuan
                                                / Woman</option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nomor Telpon</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('telp') is-invalid @enderror"
                                            id="validationCustom03" type="number" name="telp"
                                            value="{{ $detail->telp == null ? old('telp') :  $detail->telp }}" placeholder="Nomor Telpon">
                                        @error('telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Provinsi </label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('provinsi') is-invalid @enderror"
                                            id="validationCustom03" type="text" name="provinsi"
                                            value="{{ $detail->provinsi == null ? old('provinsi') : $detail->provinsi }}" placeholder="SUMATERA SELATAN, JAWA TENGAH">
                                        @error('provinsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Kota / Kabupaten
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('kota') is-invalid @enderror"
                                            id="validationCustom03" type="text" name="kota"
                                            value="{{ $detail->kota == null ? old('kota') : $detail->kota }}"
                                            placeholder="Palembang, Musi Banyuasin, Surabaya">
                                        @error('kota')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Kecamatan </label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('kecamatan') is-invalid @enderror"
                                            id="validationCustom03" type="text" name="kecamatan"
                                            value="{{ $detail->kecamatan == null ? old('kecamatan') : $detail->kecamatan }}" placeholder="Kecamatan / Desa">
                                        @error('kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Kelurahan </label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('kelurahan') is-invalid @enderror"
                                            id="validationCustom03" type="text" name="kelurahan"
                                            value="{{ $detail->kelurahan == null ? old('kelurahan') : $detail->kelurahan }}" placeholder="Kelurahan / Desa">
                                        @error('kelurahan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Alamat Lengkap</label>
                                    <div class="col-md-10">
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ $detail->alamat == null ? old('alamat') : $detail->alamat }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Upload KTP</label>
                                    <div class="col-md-10">
                                        <input type="file" name="filektp"
                                            class="dropify @error('filektp') is-invalid @enderror" data-height="100"
                                            data-allowed-file-extensions="png jpg jpeg"
                                            data-default-file="{{ $detail->ktp == null ? '' : '/koperasi/ktp/' . $detail->ktp }}">
                                        @error('filektp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Upload Foto</label>
                                    <div class="col-md-10">
                                        <input type="file" name="filefoto"
                                            class="dropify @error('filefoto') is-invalid @enderror" data-height="100"
                                            data-allowed-file-extensions="png jpg jpeg"  accept="image/*"
                                            data-default-file="{{ Auth::user()->foto == null ? '' : '/profil/' . Auth::user()->foto }}">
                                        @error('filefoto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary w-100">Upload Data Diri</button>
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
    <!-- end page-content-wrapper -->
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="/dropify/css/dropify.min.css">
@endsection
@section('js')
    <script type="text/javascript" src="/dropify/js/dropify.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropify').dropify({
                messages: {
                    default: 'Drag atau drop untuk memilih gambar',
                    replace: 'Ganti',
                    remove: 'Hapus',
                    error: 'error'
                }
            });
        });
    </script>
@endsection
