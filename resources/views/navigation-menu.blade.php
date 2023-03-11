<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <x-jet-application-mark width="36" class="text-light" />
        </div>
        <div class="sidebar-brand-text mx-3"><small>{{ config('app.name', 'Laravel') }}</small></div> --}}
        <img class="img-fluid w-35" src="{{ asset('storage/images/others/logo.png') }}" alt="DR Stoks Global Logo">
    </a>


    <hr class="sidebar-divider my-0">

    <x-jet-nav-link :active="request()->routeIs('dashboard')">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </x-jet-nav-link>

    <hr class="sidebar-divider">

    @if (Auth::user()->hasRole(['admin', 'karyawan', 'pemasok']))
        <div class="sidebar-heading">Bahan Baku</div>

        <x-jet-nav-link>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaction" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-exchange-alt"></i>
                <span>{{ __('Request Supply') }}</span>
            </a>
            <div id="collapseTransaction" class="collapse" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Riwayat Request : </h6>
                    @if (Auth::user()->hasRole(['admin', 'pemasok']))
                    <a class="collapse-item {{ request()->routeIs('tertunda.index') ? 'active font-weight-bolder' : '' }}" href="{{ route('tertunda.index') }}">
                        @if (Auth::user()->hasRole(['admin']))
                        Stok Masuk
                        @else
                        Request Supply
                        @endif
                    </a>
                    @endif
                    @if (Auth::user()->hasRole(['admin', 'karyawan']))
                    <a class="collapse-item {{ request()->routeIs('terjual.index') ? 'active font-weight-bolder' : '' }}" href="{{ route('terjual.index') }}">Stok Keluar</a>
                    @endif
                </div>
            </div>
        </x-jet-nav-link>

        {{-- <hr class="sidebar-divider"> --}}
    @endif

    @if (Auth::user()->hasRole('admin'))


        <x-jet-nav-link :active="request()->routeIs('stok.index')">
            <a class="nav-link" href="{{ route('stok.index') }}">
                <i class="fas fa-fw fa-mortar-pestle"></i>
                <span>{{ __('Data Stok') }}</span>
            </a>
        </x-jet-nav-link>

        <hr class="sidebar-divider">
    @endif

    @if (Auth::user()->hasRole('admin'))
        <div class="sidebar-heading">Perhitungan</div>

        <x-jet-nav-link>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWeighted" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-exchange-alt"></i>
                <span>{{ __('Durian') }}</span>
            </a>
            <div id="collapseWeighted" class="collapse" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <h6 class="collapse-header">Riwayat Request : </h6> --}}
                    <a class="collapse-item {{ request()->routeIs('kriteria.index') ? 'active font-weight-bolder' : '' }}" href="{{ route('kriteria.index') }}">Kriteria Durian</a>
                    <a class="collapse-item {{ request()->routeIs('alternatif.index') ? 'active font-weight-bolder' : '' }}" href="{{ route('alternatif.index') }}">Alternatif Durian</a>
                    <a class="collapse-item {{ request()->routeIs('weighted.index') ? 'active font-weight-bolder' : '' }}" href="{{ route('weighted.index') }}">Durian Terbaik</a>
                </div>
            </div>
        </x-jet-nav-link>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">Kelola Akun</div>

        <x-jet-nav-link :active="request()->routeIs('pengguna.index')">
            <a class="nav-link" href="{{ route('pengguna.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>{{ __('Daftar User') }}</span>
            </a>
        </x-jet-nav-link>

        <x-jet-nav-link :active="request()->routeIs('verify.index')">
            <a class="nav-link" href="{{ route('verify.index') }}">
                <i class="fas fa-fw fa-truck-loading"></i>
                <span>{{ __('Verifikasi Akun') }}</span>
            </a>
        </x-jet-nav-link>

        {{-- <x-jet-nav-link :active="request()->routeIs('status.index')">
            <a class="nav-link" href="{{ route('status.index') }}">
                <i class="fas fa-fw fa-truck-loading"></i>
                <span>{{ __('Status Permintaan') }}</span>
            </a>
        </x-jet-nav-link> --}}

        <hr class="sidebar-divider d-none d-md-block">
    @endif


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
