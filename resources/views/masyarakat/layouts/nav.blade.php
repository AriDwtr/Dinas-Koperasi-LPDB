<div class="topnav">
    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
        @php
            $total_pengajuan = DB::Table('pengajuan')
                ->where('id_user', Auth::user()->id)
                ->get();
        @endphp
        <div class="collapse navbar-collapse" id="topnav-menu-content">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('masyarakat/home') ? 'active' : '' }}"
                        href="{{ route('masyakarat.home') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/masyarakat/data-diri') ? 'active' : '' }}"
                        href="{{ route('masyakarat.diri') }}">
                        Data Diri
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle arrow-none'{{ Request::is('/masyarakat/pengajuan-LPDB*') ? 'active' : '' }}"
                        href="#" id="topnav-components" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Pengajuan
                        @if ($total_pengajuan->count() > 0)
                            <span class="badge badge-danger"> {{ $total_pengajuan->count() }}</span>
                        @endif
                        <div class="arrow-down"></div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                        <a href="{{ route('pengajuan-LPDB.index') }}" class="dropdown-item">
                            <div class="d-inline-block icons-sm mr-2"><i class="mdi mdi-file-document"></i></div>
                            Pengajuan LPDB
                            @if ($total_pengajuan->count() > 0)
                                <span class="badge badge-danger"> {{ $total_pengajuan->count() }}</span>
                            @endif
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>
