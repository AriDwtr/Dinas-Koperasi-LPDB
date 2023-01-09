@extends('survey.layouts.master')

@section('konten')
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Jadwal Survey Hari Ini</h4>
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
                            <h4 class="header-title">Jadwal Survey Hari Ini Tanggal : {{ date('d / F / Y') }}</h4>
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
                                            <th class="text-center">Aksi</th>
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
                                                <td>
                                                    <a href="{{ route('survey.lembar_penilaian', $data->id_jadwal) }}"
                                                        class="btn btn-primary btn-sm"><i class="mdi mdi-printer-check"></i>
                                                        Surat Perintah</a>
                                                    <br><br>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target=".bs-example-modal-center-{{ $data->id_jadwal }}"><i
                                                            class="mdi mdi-pencil-box-multiple-outline"></i> Beri
                                                        Penilaian</button>
                                                    <div class="modal fade bs-example-modal-center-{{ $data->id_jadwal }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title mt-0">Lembar Penilaian</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mt-2">
                                                                        <form
                                                                            action="{{ route('survey.hasil_upload', $data->id_jadwal) }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('put')
                                                                            <h5 class="font-size-14 mb-3">Hasil Survey</h5>
                                                                            <div
                                                                                class="custom-control custom-radio custom-control-inline mb-2">
                                                                                <input type="radio"
                                                                                    id="custominlineRadio1"
                                                                                    name="status_survey"
                                                                                    class="custom-control-input"
                                                                                    value="disetujui" checked>
                                                                                <label class="custom-control-label"
                                                                                    for="custominlineRadio1">Tempat Usaha
                                                                                    Layak Mendapatkan Bantuan Dana
                                                                                    LPDB</label>
                                                                            </div>
                                                                            <div
                                                                                class="custom-control custom-radio custom-control-inline mb-2">
                                                                                <input type="radio"
                                                                                    id="custominlineRadio2"
                                                                                    name="status_survey"
                                                                                    class="custom-control-input"
                                                                                    value="ditolak">
                                                                                <label class="custom-control-label"
                                                                                    for="custominlineRadio2">Tidak Layak dan
                                                                                    Sesuai dengan Data Yang
                                                                                    Dimasukan</label>
                                                                            </div>
                                                                            <hr>
                                                                            <h5 class="font-size-14">Ringkasan Hasil Survey
                                                                            </h5>
                                                                            <textarea name="hasil_survey" class="form-control" id="" cols="5" rows="5" required></textarea>
                                                                            <div class="mt-2">
                                                                                <h5 class="font-size-14 text-left">Upload
                                                                                    Laporan Keuangan
                                                                                </h5>
                                                                                <input type="file" name="filehasil"
                                                                                    class="dropify @error('filehasil') is-invalid @enderror"
                                                                                    data-height="100"
                                                                                    accept="application/pdf">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm mt-2 w-100">Kirim
                                                                                Laporan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th colspan="7" class="text-center"><b>Tidak Ada Jadwal Pemeriksaan Lokasi Hari Ini</b></th>
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
