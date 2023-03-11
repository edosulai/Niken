<x-app-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        {{-- <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="cetak"><i class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</button> --}}
    </div>

    <div id="main_dash">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Analisa</h6>
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
                            @livewire('weighted')
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="7" class="text-center">Matrix Alternatif - Kriteria</th>
                        </tr>
                        <tr>
                            <th>Alternatif / Kriteria</th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                            <th>K5</th>
                            <th>K6</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $alternatif->count(); $i++)
                            <tr>
                                <td>
                                    <b>A{{ $i + 1 }}</b>
                                </td>
                                @for ($j = 0; $j < $kriteria->count(); $j++)
                                    <td>{{ $alternatif[$i]['k_value'][$j] }}</td>
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="8" class="text-center">Perhitungan Bobot Kepentingan</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                            <th>K5</th>
                            <th>K6</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    @php
                        $tkep = 0;
                        $tbkep = 0;
                    @endphp
                    <tbody>
                        <tr>
                            <td><b>Kepentingan</b></td>
                            @for ($i = 0; $i < $kriteria->count(); $i++)
                                @php
                                    $tkep = $tkep + $kriteria[$i]->kepentingan;
                                @endphp
                                <td>{{ $kriteria[$i]->kepentingan }}</td>
                            @endfor
                            <td>{{ $tkep }}</td>
                        </tr>
                        <tr>
                            <td><b>W/Bobot Kepentingan</b></td>
                            @for ($i = 0; $i < $kriteria->count(); $i++)
                                @php
                                    $bkep[$i] = $kriteria[$i]->kepentingan / $tkep;
                                    $tbkep = $tbkep + $bkep[$i];
                                @endphp
                                <td>{{ round($bkep[$i], 6) }}</td>
                            @endfor
                            <td>{{ $tbkep }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                @foreach ($kriteria as $key => $each)
                                    <x-bobot-kriteria :iterasi="$key++" :targetBobot="$each->kepentingan" :dataBobot="$kriteria->map(fn($x) => $x->kepentingan)->toArray()" />
                                @endforeach
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="7" class="text-center">Perhitungan Pangkat</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                            <th>K5</th>
                            <th>K6</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Cost/Benefit</b></td>
                            @for ($i = 0; $i < $kriteria->count(); $i++)
                                <td>{{ ucwords($kriteria[$i]->tipe) }}</td>
                            @endfor
                        </tr>
                        <tr>
                            <td><b>W/Bobot</b></td>
                            @for ($i = 0; $i < $kriteria->count(); $i++)
                                @if ($kriteria[$i]->tipe == 'cost')
                                    @php
                                        $pangkat[$i] = -1 * $bkep[$i];
                                    @endphp
                                    <td>{{ round($pangkat[$i], 6) }}</td>
                                @else
                                    @php
                                        $pangkat[$i] = $bkep[$i];
                                    @endphp
                                    <td>{{ round($pangkat[$i], 6) }}</td>
                                @endif
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Perhitungan Nilai S</th>
                        </tr>
                        <tr>
                            <th>Alternatif</th>
                            <th>S</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $dataVector = [];
                        @endphp
                        @for ($i = 0; $i < $alternatif->count(); $i++)
                            <tr>
                                <td><b>A{{ $i + 1 }}</b></td>
                                @for ($j = 0; $j < $kriteria->count(); $j++)
                                    @php
                                        $dataVector[$i][$j] = [
                                            'k_value' => $alternatif[$i]['k_value'][$j],
                                            'pangkat' => $pangkat[$j],
                                        ];
                                        $s[$i][$j] = pow($alternatif[$i]['k_value'][$j], $pangkat[$j]);
                                    @endphp
                                @endfor
                                @php
                                    $ss[$i] = $s[$i][0] * $s[$i][1] * $s[$i][2] * $s[$i][3] * $s[$i][4] * $s[$i][5];
                                @endphp
                                <td>{{ round($ss[$i], 6) }}</td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                @for ($i = 0; $i < $alternatif->count(); $i++)
                                    <x-vector-s :iterasi="$i + 1" :dataVector="$dataVector[$i]" />
                                @endfor
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Hasil Akhir</th>
                        </tr>
                        <tr>
                            <th>Alternatif</th>
                            <th>V</th>
                        </tr>
                    </thead>
                    @php
                        $total = 0;
                    @endphp
                    <tbody>
                        @for ($i = 0; $i < $alternatif->count(); $i++)
                            @php
                                $total = $total + $ss[$i];
                            @endphp
                        @endfor
                        @for ($i = 0; $i < $alternatif->count(); $i++)
                            <tr>
                                <td><b>{{ $alternatif[$i]->stoks_nama }}</b></td>
                                @php
                                    $v[$i] = round($ss[$i] / $total, 6);
                                @endphp
                                <td>{{ $v[$i] }}</td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                    @for ($i = 0; $i < $alternatif->count(); $i++)
                                        <x-vector-kriteria :iterasi="$i + 1" :targetVector="$ss[$i]" :dataVector="$ss" />
                                    @endfor
                                </td>
                            </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-12 text-center">
                @php
                    $alt_name = $alternatif->map(fn($x) => $x->stoks_nama)->toArray();
                    end($alt_name);
                    $alt = key($alt_name) + 1;
                    function cmp($a, $b)
                    {
                        if ($a == $b) {
                            return 0;
                        }
                        return $a < $b ? -1 : 1;
                    }
                    uasort($v, 'cmp');
                @endphp
                @for ($i = 0; $i < $alt; $i++)
                    @if ($i == 0)
                        <div class='alert alert-dismissible alert-info'><b><i>Dari tabel tersebut dapat disimpulkan bahwa {{ $alt_name[array_search(end($v), $v)] }} mempunyai hasil paling tinggi, yaitu {{ current($v) }}
                                @elseif ($i == $alt - 1)
                                    </br>Dan terakhir {{ $alt_name[array_search(prev($v), $v)] }} dengan nilai {{ current($v) }}</i></b></div>
                    @else
                        </br>Lalu diikuti dengan {{ $alt_name[array_search(prev($v), $v)] }} dengan nilai {{ current($v) }}
                    @endif
                @endfor
            </div>

        </div>
    </div>

</x-app-layout>
