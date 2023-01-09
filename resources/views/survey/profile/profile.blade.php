@extends('survey.layouts.master')

@section('konten')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Profile {{ Str::title($user->nama) }}</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('survey.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">/</li>
                        <li class="breadcrumb-item active">Profile {{ Str::title($user->nama) }}</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
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
                            @error('filefoto')
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <h4 class="header-title mb-3">Profile Diri {{ $user->nama }}</h4>
                            <form action="{{ Route('survey.profile_update', Auth::user()->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nomor Induk
                                        Keluarga (KTP)</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('nik') is-invalid @enderror"
                                            id="validationCustom03" type="number" name="nik"
                                            value="{{ $detail->nik }}" placeholder="Nomor Induk Keluarga ( NIK KTP )">
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nomor Induk
                                        Pegawai (NIP)</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('nip') is-invalid @enderror"
                                            id="validationCustom03" type="number" name="nip"
                                            value="{{ $detail->nip }}" placeholder="Nomor Induk Pegawai ( NIP )">
                                        @error('nip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('nama') is-invalid @enderror"
                                            id="validationCustom03" type="text" name="nama"
                                            value="{{ $user->nama }}" placeholder="Nama Lengkap">
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
                                            value="{{ $detail->tempat_lahir }}" placeholder="Tempat Lahir">
                                        @error('tempat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <input class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            id="validationCustom03" type="date" name="tgl_lahir"
                                            value="{{ $detail->tanggal_lahir }}" placeholder="Tanggal Lahir">
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
                                            value="{{ $detail->telp }}" placeholder="Nomor Telpon">
                                        @error('telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Alamat Lengkap</label>
                                    <div class="col-md-10">
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ $detail->alamat }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Upload Foto</label>
                                    <div class="col-md-10">
                                        @if ($user->foto == null)
                                            <input type="file" name="filefoto"
                                                class="dropify @error('filefoto') is-invalid @enderror" data-height="100"
                                                data-allowed-file-extensions="png jpg jpeg" data-default-file="">
                                        @else
                                            <input type="file" name="filefoto"
                                                class="dropify @error('filefoto') is-invalid @enderror" data-height="100"
                                                data-allowed-file-extensions="png jpg jpeg"
                                                data-default-file="/profil/{{ $user->foto }}">
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Email Akun</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            id="validationCustom03" type="email" name="email"
                                            value="{{ $user->email }}" placeholder="Email Akun">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Jenis Akun</label>
                                    <div class="col-md-10">
                                        <select class="custom-select @error('akun') is-invalid @enderror" name="akun">
                                            <option value="">Pilih Jenis Akun</option>
                                            <option value="pegawai" {{ $user->type == 'pegawai' ? 'selected' : '' }}>
                                                Pegawai</option>
                                            <option value="survey" {{ $user->type == 'survey' ? 'selected' : '' }}>Tim
                                                Survey</option>
                                        </select>
                                        @error('akun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary w-100">Perbaharui Profile</button>
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

@section('css')
    <link rel="stylesheet" type="text/css" href="/dropify/css/dropify.min.css">
@endsection
@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>
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
