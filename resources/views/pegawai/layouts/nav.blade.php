<div class="topnav">
    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

        <div class="collapse navbar-collapse" id="topnav-menu-content">
            <ul class="navbar-nav">
                @php
                    $total_pengajuan = DB::Table('pengajuan')
                        ->where('status', 'ditinjau')
                        ->orWhere('status', 'diterima')
                        ->get();
                    $total_ditinjau = DB::Table('pengajuan')
                        ->where('status', 'ditinjau')
                        ->get();
                    $total_diterima = DB::Table('pengajuan')
                        ->where('status', 'diterima')
                        ->get();
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/pegawai/home') ? 'active' : '' }}"
                        href="{{ route('pegawai.home') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pengajuan
                        @if ($total_pengajuan->count() > 0)
                            <span class="badge badge-danger"> {{ $total_pengajuan->count() }}</span>
                        @endif
                        <div class="arrow-down"></div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                        <a href="{{ route('pegawai.pengajuan_tinjau') }}" class="dropdown-item">
                            <div class="d-inline-block icons-sm mr-2"><i class="mdi mdi-file-document"></i></div>
                            Menunggu Persetujuan Pengajuan LPDB
                            @if ($total_ditinjau->count() > 0)
                                <span class="badge badge-danger"> {{ $total_ditinjau->count() }}</span>
                            @endif
                        </a>
                        <a href="{{ route('pegawai.pengajuan_diterima_index') }}" class="dropdown-item">
                            <div class="d-inline-block icons-sm mr-2"><i class="mdi mdi-car-multiple"></i></div>
                            Buat Jadwal Survey Lokasi Usaha
                            @if ($total_diterima->count() > 0)
                                <span class="badge badge-danger"> {{ $total_diterima->count() }}</span>
                            @endif
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/pegawai/survey') ? 'active' : '' }}"
                        href="{{ route('pegawai.survey_usaha') }}">
                        Survey Usaha
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/pegawai/data-pegawai*') ? 'active' : '' }}"
                        href="{{ route('data-pegawai.index') }}">
                        Data-Pegawai
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/pegawai/data-masyarakat*') ? 'active' : '' }}"
                        href="{{ route('pegawai.masyarakat') }}">
                        Data-Masyarakat
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
