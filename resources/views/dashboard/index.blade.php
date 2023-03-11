<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        {{-- <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="cetak"><i class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</button> --}}
    </div>

    <div id="main_dash">
        <div class="row">
            <div class="col-xl-4 col-md-12 mb-4 dash_card">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('stok.index') }}">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Total Stok Barang') }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total }}</div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4 dash_card">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('tertunda.index') }}">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Stok Masuk') }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masuk }}</div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4 dash_card">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('terjual.index') }}">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Stok Keluar') }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $keluar }}</div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Stok Masuk dan Keluar</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">... :</div>
                                <a class="dropdown-item" href="#">...</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">...</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <div class="chart-area" style="height: auto">
                            @livewire('earning')
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Stok Tersedia</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">... :</div>
                                <a class="dropdown-item" href="#">...</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">...</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <div class="chart-area" style="height: auto">
                            @livewire('stock')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
