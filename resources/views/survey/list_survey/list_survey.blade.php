@extends('survey.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Jadwal Survey</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('survey.home') }}">Dashboard</a></li>
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
                    @error('filehasil')
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @if (session('success'))
                        <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Jadwal Survey</h4>
                            <p class="card-title-desc">
                                Survey Lokasi Tempat Usaha / UMKM/ PT untuk Pengajuan Dana LPDB Sebagai Bahan Pertimbangan
                            </p>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>No Pengajuan</th>
                                            <th>Nama Usaha</th>
                                            <th>Jenis Usaha</th>
                                            <th>Tanggal Survey</th>
                                            <th>Nama Yang Mengajukan</th>
                                            <th>Alamat Usaha</th>
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
                                            </tr>
                                        @empty
                                            <tr>
                                                <th colspan="6" class="text-center"><b>Tidak Ada Jadwal Pemeriksaan Lokasi Hari Ini</b></th>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
