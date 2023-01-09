<div class="topnav">
    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

        <div class="collapse navbar-collapse" id="topnav-menu-content">
            <ul class="navbar-nav">
                @php
                    $today = DB::Table('jadwal_survey')
                        ->Where('tanggal_survey', date('Y-m-d'))
                        ->Where(function ($query) {
                            $query->where('jadwal_survey.status_survey', 'terjadwal');
                        })
                        ->get();
                    $all_day = DB::Table('jadwal_survey')
                        ->where('jadwal_survey.status_survey', 'terjadwal')
                        ->get();
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/survey/home') ? 'active' : '' }}"
                        href="{{ route('survey.home') }}">
                        Jadwal Survey
                        @if ($today->count() > 0)
                            <span class="badge badge-danger"> {{ $today->count() }}</span>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/survey/list-survey') ? 'active' : '' }}"
                        href="{{ route('survey.list_survey') }}">
                        Seluruh Jadwal Survey
                        @if ($all_day->count() > 0)
                            <span class="badge badge-danger"> {{ $all_day->count() }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
