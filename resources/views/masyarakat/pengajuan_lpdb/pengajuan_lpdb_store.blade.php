@extends('masyarakat.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Pengajuan LPDB</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('masyakarat.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">/</li>
                        <li class="breadcrumb-item active">Pengajuan LPDB</li>
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
                    @error('foto_usaha')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('filenpwp')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('filepermohonan')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('fileproposal')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('fileakta')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('filekeuangan')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('filelegalitas')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <br>
                    <br>
                    <div class="timeline" dir="ltr">
                        <form action="{{ route('pengajuan-LPDB.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="timeline-item timeline-left">
                                <div class="timeline-block">
                                    <div class="timeline-box card">
                                        <div class="card-body">
                                            <div class="timeline-icon icons-md">
                                                <i class="uim uim-layer-group"></i>
                                            </div>
                                            <div class="d-inline-block py-1 px-3 bg-primary text-white badge-pill">
                                                Tahapan 1 | Form Pendataan Pengajuan
                                            </div>
                                            <p class="mt-3 mb-2"><b>Lengkapi Form Pengajuan </b> <span
                                                    class="text-danger">*Wajib Di isi</span></p>
                                            <div class="text-muted">
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Nama Usaha / UMKM / CV / PT
                                                            </h5>
                                                            <input
                                                                class="form-control @error('nama_usaha')
                                                                is-invalid
                                                            @enderror"
                                                                name="nama_usaha" type="text"
                                                                placeholder="Nama Usaha / UMKM / CV / PT"
                                                                value="{{ old('nama_usaha') }}">
                                                            @error('nama_usaha')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Jenis Usaha</h5>
                                                            <input
                                                                class="form-control @error('jenis_usaha')
                                                                is-invalid
                                                            @enderror"
                                                                name="jenis_usaha" type="text"
                                                                placeholder="Rumah Makan, Bengkel Sepeda Motor"
                                                                value="{{ old('jenis_usaha') }}">
                                                            @error('jenis_usaha')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Bentuk Usaha</h5>
                                                            <select
                                                                class="custom-select @error('bentuk_usaha')
                                                            is-invalid
                                                            @enderror"
                                                                name="bentuk_usaha">
                                                                <option value="UMKM"
                                                                    {{ old('bentuk_usaha') == 'UMKM' ? 'selected' : '' }}>
                                                                    Usaha Mikro Kecil Menengah (UMKM)
                                                                </option>
                                                                <option value="CV"
                                                                    {{ old('bentuk_usaha') == 'CV' ? 'selected' : '' }}>
                                                                    Commanditaire Vennootschap (CV)
                                                                </option>
                                                                <option value="PT"
                                                                    {{ old('bentuk_usaha') == 'PT' ? 'selected' : '' }}>
                                                                    Perseroan Terbatas (PT)</option>
                                                            </select>
                                                            @error('bentuk_usaha')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Provinsi Usaha</h5>
                                                            <input
                                                                class="form-control @error('provinsi')
                                                                is-invalid
                                                            @enderror"
                                                                name="provinsi" type="text"
                                                                placeholder="Sumatera Selatan, Jawa Tengah"
                                                                value="{{ old('provinsi') }}">
                                                            @error('provinsi')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Kabupaten / Kota Usaha</h5>
                                                            <input
                                                                class="form-control @error('kota')
                                                                is-invalid
                                                            @enderror"
                                                                name="kota" type="text"
                                                                placeholder="Palembang, Semarang, Jakarta"
                                                                value="{{ old('kota') }}">
                                                            @error('kota')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Kecamatan Usaha</h5>
                                                            <input
                                                                class="form-control @error('kecamatan')
                                                                is-invalid
                                                            @enderror"
                                                                name="kecamatan" type="text"
                                                                placeholder="Suka Bangun, Sukarami"
                                                                value="{{ old('kecamatan') }}">
                                                            @error('kecamatan')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Kelurahan Usaha</h5>
                                                            <input
                                                                class="form-control @error('kelurahan')
                                                                is-invalid
                                                            @enderror"
                                                                name="kelurahan" type="text"
                                                                placeholder="Suka Jaya, Ilir Barat "
                                                                value="{{ old('kelurahan') }}">
                                                            @error('kelurahan')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Alamat Lengkap Usaha
                                                            </h5>
                                                            <input
                                                                class="form-control @error('alamat_usaha')
                                                                is-invalid
                                                            @enderror"
                                                                name="alamat_usaha" type="text"
                                                                placeholder="Alamat Lengkap Usaha"
                                                                value="{{ old('alamat_usaha') }}">
                                                            @error('alamat_usaha')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Foto Tempat Usaha UMKM
                                                            </h5>
                                                            <input type="file" name="foto_usaha"
                                                                class="dropify @error('foto_usaha') is-invalid @enderror"
                                                                data-height="100" accept="image/*">
                                                            @error('foto_usaha')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-box card">
                                        <div class="card-body">
                                            <div class="timeline-icon icons-md">
                                                <i class="uim uim-layer-group"></i>
                                            </div>
                                            <div class="d-inline-block py-1 px-3 bg-primary text-white badge-pill">
                                                Tahapan 2 | Download Dokumen Permohonan
                                            </div>
                                            <p class="mt-3 mb-2">Unduh Dokumen Permohonan</p>
                                            <div class="text-muted">
                                                <p class="mb-0">Unduh Dokumen Permohonan Di Bawah ini Setelah itu
                                                    Lengkapi
                                                    Secara Benar Demi Memudahkan Tim Seleksi Dalam Melakukan Pengecekan
                                                    Data Data Pengajuan Dana LPDB
                                                </p>
                                                <p class="mt-3"><a href="{{ route('masyakarat.download_permohonan') }}"
                                                        class="text-success"><u>Unduh Dokumen Permohonan</u></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item timeline-left">
                                <div class="timeline-block">
                                    <div class="timeline-box card">
                                        <div class="card-body">
                                            <div class="timeline-icon icons-md">
                                                <i class="uim uim-layer-group"></i>
                                            </div>
                                            <div class="d-inline-block py-1 px-3 bg-primary text-white badge-pill">
                                                Tahapan 3 | Upload Dokumen Nomor Pokok Wajib Pajak (NPWP)
                                            </div>
                                            <p class="mt-3 mb-2"><b>Lengkapi Form Nomor Pokok Wajib Pajak (NPWP) </b> <span
                                                    class="text-danger">*Wajib Di isi</span></p>
                                            <div class="text-muted">
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">No. NPWP
                                                            </h5>
                                                            <input
                                                                class="form-control @error('no_npwp')
                                                                is-invalid
                                                            @enderror"
                                                                name="no_npwp" type="text" placeholder="Nomor NPWP"
                                                                value="{{ old('no_npwp') }}">
                                                            @error('no_npwp')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Upload NPWP
                                                            </h5>
                                                            <input type="file" name="filenpwp"
                                                                class="dropify @error('filenpwp') is-invalid @enderror"
                                                                data-height="100"
                                                                accept="image/jpeg, image/png, image/jpg">
                                                            @error('filenpwp')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-box card">
                                        <div class="card-body">
                                            <div class="timeline-icon icons-md">
                                                <i class="uim uim-layer-group"></i>
                                            </div>
                                            <div class="d-inline-block py-1 px-3 bg-primary text-white badge-pill">
                                                Tahapan 4 | Upload Dokumen Pendukung
                                            </div>
                                            <p class="mt-3 mb-2"><b>Melakukan Upload Dokumen Dokumen Yang Dibutuhkan
                                                    Sebagai Bahan Pertimbangan</b> <span class="text-danger">*Wajib Di
                                                    Upload</span></p>
                                            <div class="text-muted">
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Upload Berkas Permohonan
                                                                Pengajuan LPDB
                                                            </h5>
                                                            <input type="file" name="filepermohonan"
                                                                class="dropify @error('filepermohonan') is-invalid @enderror"
                                                                data-height="100" accept="application/pdf">
                                                            @error('filepermohonan')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Upload Proposal Usaha / UMKM
                                                                / CV / PT
                                                            </h5>
                                                            <input type="file" name="fileproposal"
                                                                class="dropify @error('fileproposal') is-invalid @enderror"
                                                                data-height="100" accept="application/pdf">
                                                            @error('fileproposal')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Upload Akta Usaha / UMKM /
                                                                CV / PT
                                                            </h5>
                                                            <input type="file" name="fileakta"
                                                                class="dropify @error('fileakta') is-invalid @enderror"
                                                                data-height="100" accept="application/pdf">
                                                            @error('fileakta')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Upload Laporan Keuangan
                                                            </h5>
                                                            <input type="file" name="filekeuangan"
                                                                class="dropify @error('filekeuangan') is-invalid @enderror"
                                                                data-height="100" accept="application/pdf">
                                                            @error('filekeuangan')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <div>
                                                            <h5 class="font-size-14 text-left">Upload Legalitas Usaha
                                                            </h5>
                                                            <input type="file" name="filelegalitas"
                                                                class="dropify @error('filelegalitas') is-invalid @enderror"
                                                                data-height="100" accept="application/pdf">
                                                            @error('filelegalitas')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <button type="submit" class="btn btn-primary w-100">Kirim
                                                            Pengajuan LPDB</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script type="text/javascript" src="/dropify/js/dropify.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropify').dropify({
                messages: {
                    default: 'Drag atau drop untuk memilih File',
                    replace: 'Ganti',
                    remove: 'Hapus',
                    error: 'error'
                }
            });
        });
    </script>
@endsection
