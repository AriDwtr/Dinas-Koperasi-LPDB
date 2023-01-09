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
                    <div class="card">
                        <div class="card-body">
                            @if ($cek->nama == null or
                                $cek->nik == null or
                                $cek->tempat_lahir == null or
                                $cek->tanggal_lahir == null or
                                $cek->gender == null or
                                $cek->telp == null or
                                $cek->kecamatan == null or
                                $cek->kelurahan == null or
                                $cek->kota == null or
                                $cek->provinsi == null or
                                $cek->alamat == null or
                                $cek->ktp == null or
                                Auth::user()->foto == null)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card border mb-0">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="icons-xl uim-icon-danger my-4">
                                                        <i class="uim uim-times-circle"></i>
                                                    </div>
                                                    <h4 class="alert-heading font-size-20">Pengajuan Belum Dapat Di Akses
                                                        Karena Anda Belum Melengkapi Data Diri</h4>
                                                    <p class="text-muted"><a href="{{ route('masyakarat.diri') }}">Lengkapi
                                                            Data Diri Sekarang</a></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (session('success'))
                                    <div class="alert alert-success alert-primary" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <h4 class="header-title">Pengajuan Pinjaman Dana Bergulir Kepada LPDB-KUMKM</h4>
                                <p class="card-title-desc">Pengajuan yang di anda ajukan dapat anda lihat pada tabel di
                                    bawah ini sejauh mana proses pengajuan anda</code>.
                                </p>
                                @php
                                    $data_pengajuan = DB::Table('pengajuan')
                                        ->where('id_user', Auth::user()->id)
                                        ->get();
                                @endphp
                                @if ($data_pengajuan->count() < 2)
                                    <a href="{{ route('pengajuan-LPDB.create') }}" class="mb-3 btn btn-primary">
                                        <i class="mdi mdi-plus-thick"></i>
                                        <i class="mdi mdi-newspaper-variant-multiple"></i>
                                        &nbsp;
                                        Tambahkan Pengajuan
                                    </a>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>NO PENGAJUAN</th>
                                                <th class="text-center">NAMA USAHA</th>
                                                <th class="text-center">BENTUK USAHA</th>
                                                <th class="text-center">JENIS USAHA</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pengajuan as $data)
                                                <tr>
                                                    <td>Nomor : P / {{ date('m', strtotime($data->created_at)) }} /
                                                        0{{ $data->id_pengajuan }}</td>
                                                    <td class="text-center"><b>{{ Str::title($data->nama_usaha) }}</b></td>
                                                    <td class="text-center"><i>{{ $data->bentuk_usaha }}</i></td>
                                                    <td class="text-center">{{ Str::title($data->jenis_usaha) }}</td>
                                                    <td class="text-center">
                                                        @if ($data->status == null)
                                                            <span class="badge badge-warning">Belum Melakukan
                                                                Pengajuan</span>
                                                        @elseif ($data->status == 'ditinjau')
                                                            <span class="badge badge-info">Sedang Di Tinjau</span>
                                                        @elseif ($data->status == 'ditolak')
                                                            <span class="badge badge-danger">Di Tolak</span><br>
                                                            <a href="" data-toggle="modal"
                                                                data-target=".bs-example-modal-center-{{ $data->id_pengajuan }}"><u>Lihat
                                                                    Alasan</u></a>
                                                            <div class="modal fade bs-example-modal-center-{{ $data->id_pengajuan }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title mt-0">Alasan Penolakan
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <textarea class="form-control" id="" cols="30" rows="10" disabled>{{ $data->keterangan }}</textarea>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                        @elseif ($data->status == 'diterima')
                                                            <span class="badge badge-primary">Di Terima, Belum
                                                                Terjadwal</span>
                                                        @elseif ($data->status == 'terjadwal')
                                                            <span class="badge badge-primary">Di Terima, Jadwal Telah
                                                                Terbit</span>
                                                        @elseif ($data->status == 'suspend')
                                                        <span class="badge badge-danger">Di Tolak, Pengajuan Di Hentikan</span>
                                                        @elseif ($data->status == 'pengajuan_berhasil')
                                                        <span class="badge badge-primary">Pengajuan Di Setujui</span>
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($data->status == null)
                                                            <a href="{{ route('pengajuan-LPDB.show', $data->id_pengajuan) }}"
                                                                style="color:green"
                                                                onclick="return confirm('Apakah Data Usaha Telah Lengkap, Untuk Melakukan Pengajuan ?')"><i
                                                                    class="mdi mdi-hand-left"></i>
                                                                Ajukan Dana</a>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('pengajuan-LPDB.edit', $data->id_pengajuan) }}"
                                                                style="color:darkorange"><i class="mdi mdi-file-edit"></i>
                                                                Ubah</a>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('pengajuan-LPDB.destroy', $data->id_pengajuan) }}"
                                                                onclick="event.preventDefault();
                                                            document.getElementById('delete-pengajuan-{{ $data->id_pengajuan }}').submit();"
                                                                style="color: red"><i class="mdi mdi-trash-can"></i>
                                                                Hapus</a>
                                                        @elseif ($data->status == 'ditinjau')

                                                        @elseif ($data->status == 'ditolak')
                                                            <a href="{{ route('pengajuan-LPDB.show', $data->id_pengajuan) }}"
                                                                style="color:green"
                                                                onclick="return confirm('Apakah Data Usaha Telah Lengkap, Untuk Melakukan Pengajuan ?')"><i
                                                                    class="mdi mdi-hand-left"></i>
                                                                Ajukan Ulang</a>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('pengajuan-LPDB.edit', $data->id_pengajuan) }}"
                                                                style="color:darkorange"><i class="mdi mdi-file-edit"></i>
                                                                Ubah</a>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('pengajuan-LPDB.destroy', $data->id_pengajuan) }}"
                                                                onclick="event.preventDefault();
                                                            document.getElementById('delete-pengajuan-{{ $data->id_pengajuan }}').submit();"
                                                                style="color: red"><i class="mdi mdi-trash-can"></i>
                                                                Hapus</a>
                                                        @elseif ($data->status == 'diterima')
                                                            <p style="color: red" class="font-size-13">Jadwal Survey Belum Terbit</p>
                                                        @elseif ($data->status == 'terjadwal')
                                                            <button style="color:green" data-toggle="modal"
                                                                data-target=".bs-example-modal-sm-{{ $data->id_pengajuan }}"><i
                                                                    class="mdi mdi-calendar-weekend"></i>
                                                                Lihat Jadwal</button>
                                                            <div class="modal fade bs-example-modal-sm-{{ $data->id_pengajuan }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title mt-0"
                                                                                id="mySmallModalLabel">Jadwal Pemeriksaan
                                                                                {{ Str::title($data->nama_usaha) }}</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            @php
                                                                                $cek_jadwal_pengajuan = DB::Table('jadwal_survey')
                                                                                    ->Where('id_pengajuan', $data->id_pengajuan)
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ( $cek_jadwal_pengajuan as $cek_jadwal_pengajuan)
                                                                                <p>Jadwal Pemeriksaan : <span class="badge badge-danger"> {{ date('d - F - Y', strtotime($cek_jadwal_pengajuan->tanggal_survey)) }} </span></p>
                                                                                <div class="alert alert-primary" role="alert">
                                                                                    <b>Di Wajibkan Untuk Menyiapkan</b>
                                                                                    <li>Dokumen Permohonan Di Print / Cetak</li>
                                                                                    <li>Dokumen Proposal Usaha Di Print / Cetak</li>
                                                                                    <li>Dokumen Laporan Keuangan Usaha Di Print / Cetak</li>
                                                                                    <li>Dokumen Akta Usaha Di Print / Cetak</li>
                                                                                    <li>Dokumen Legalitas Usaha Di Print / Cetak</li>
                                                                                </div>
                                                                                <div class="alert alert-danger" role="alert">
                                                                                    <b>Peringatan !!! Pada Saat Jadwal Pemeriksaan Mohon Untuk Tetap Di Rumah Karena Apabila Tim Survey Tidak Dapat Menemukan Tempat Usaha dan Anda Tidak Dapat Di Hubungi Maka Pengajuan Dana LPDB Di Pastikan Gagal</b>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                        @elseif ($data->status == 'suspend')
                                                            <p style="color: red" class="font-size-13">Mohon Maaf Pengajuan Anda Di Tolak Sepenuhnya</p>
                                                        @elseif ($data->status == 'pengajuan_berhasil')
                                                        <a href="{{ route('masyarakat.sk_masyarakat', $data->id_pengajuan) }}"
                                                            style="color:green"><i class="mdi mdi-file-edit"></i>
                                                            Lihak SK Penerima Pengajuan</a>
                                                        @else
                                                        @endif
                                                        <form id="delete-pengajuan-{{ $data->id_pengajuan }}"
                                                            action="{{ route('pengajuan-LPDB.destroy', $data->id_pengajuan) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center" style="color:maroon">ANDA
                                                        BELUM
                                                        MELAKUKAN PENGAJUAN DANA LPDB</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @endif
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
            $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
