<?php

namespace App\Http\Livewire;

use App\Charts\WeightedChart;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Support\Livewire\ChartComponent;
use App\Support\Livewire\ChartComponentData;
use Illuminate\Support\Collection;
use Livewire\Component;

class Weighted extends ChartComponent
{
    /**
     * @return string
     */
    protected function view(): string
    {
        return 'livewire.weighted';
    }

    /**
     * @return string
     */
    protected function chartClass(): string
    {
        return WeightedChart::class;
    }

    /**
     * @return \App\Support\Livewire\ChartComponentData
     */
    protected function chartData(): ChartComponentData
    {
        $alternatif = Alternatif::selectRaw("alternatifs.k_value, stoks.nama as stoks_nama")
            ->join('stoks', 'alternatifs.stok_id', '=', 'stoks.id')
            ->orderBy('alternatifs.created_at')
            ->get();

        $kriteria = Kriteria::select()->orderBy('kriterias.created_at')->get();

        $k = $kriteria->count();
        $a = $alternatif->count();

        $tkep = 0;
        $tbkep = 0;

        for ($i = 0; $i < $k; $i++) {
            $tkep = $tkep + $kriteria[$i]->kepentingan;
        }

        for ($i = 0; $i < $k; $i++) {
            $bkep[$i] = ($kriteria[$i]->kepentingan / $tkep);
            $tbkep = $tbkep + $bkep[$i];
        }

        for ($i = 0; $i < $k; $i++) {
            if ($kriteria[$i]->tipe == "cost") {
                $pangkat[$i] = (-1) * $bkep[$i];
            } else {
                $pangkat[$i] = $bkep[$i];
            }
        }

        for ($i = 0; $i < $a; $i++) {
            for ($j = 0; $j < $k; $j++) {
                $s[$i][$j] = pow(($alternatif[$i]['k_value'][$j]), $pangkat[$j]);
            }
            $ss[$i] = $s[$i][0] * $s[$i][1] * $s[$i][2] * $s[$i][3] * $s[$i][4];
        }

        $total = 0;
        for ($i = 0; $i < $a; $i++) {
            $total = $total + $ss[$i];
        }

        for ($i = 0; $i < $a; $i++) {
            $v[$i] = round($ss[$i] / $total, 6);
        }

        $labels = $alternatif->map(function ($alternatif, $key) {
            return $alternatif->stoks_nama;
        });

        $datasets = new Collection([
            'weighted' => collect($v)
        ]);

        return (new ChartComponentData($labels, $datasets));
    }
}
