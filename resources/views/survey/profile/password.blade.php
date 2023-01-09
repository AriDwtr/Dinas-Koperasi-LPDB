@extends('survey.layouts.master')

@section('konten')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Ubah Password {{ Str::title($user->nama) }}</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('survey.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">/</li>
                        <li class="breadcrumb-item active">Ubah Password {{ Str::title($user->nama) }}</li>
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
                            <h4 class="header-title mb-3">Ubah Password {{ $user->nama }}</h4>
                            <form action="{{ Route('survey.password_update', Auth::user()->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Buat Password Akun
                                        Baru</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('password') is-invalid @enderror" id="myInput"
                                            type="password" name="password" value="{{ old('password') }}"
                                            placeholder="Password Akun">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Tulis Ulang
                                        Password Baru</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('repassword') is-invalid @enderror" id="myInput2"
                                            type="password" name="repassword" placeholder="Tulis Ulang Password">
                                        @error('repassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary w-100">Perbaharui Password</button>
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

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
