<div class="float-right">

    <div class="dropdown d-inline-block ml-2">
        {{-- <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-magnify"></i>
        </button> --}}
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

            <form class="p-3">
                <div class="form-group m-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
            <i class="mdi mdi-tune"></i>
        </button>
    </div> --}}

    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if (Auth::user()->foto == NULL)
            <img class="rounded-circle header-profile-user" src="/profil/default.jpg" alt="Header Avatar">
            @else
            <img class="rounded-circle header-profile-user" src="/profil/{{ Auth::user()->foto }}" alt="Header Avatar">
            @endif
            <span class="d-none d-sm-inline-block ml-1">
                @php
                    $nama = Auth::user()->nama;
                    $pecah = explode(" ",$nama);
                    echo Str::upper($pecah[0]);
                @endphp
            </span>
            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <!-- item-->
            <a class="dropdown-item" href="{{ route('masyarakat.password') }}"><i class="mdi mdi-key-link font-size-16 align-middle mr-1"></i> Ubah Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
