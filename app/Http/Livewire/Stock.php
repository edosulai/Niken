<?php

namespace App\Http\Livewire;

use App\Charts\StockChart;
use App\Models\Stok;
use App\Support\Livewire\ChartComponent;
use App\Support\Livewire\ChartComponentData;
use Faker\Generator;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Stock extends ChartComponent
{
    /**
     * @return string
     */
    protected function view(): string
    {
        return 'livewire.stock';
    }

    /**
     * @return string
     */
    protected function chartClass(): string
    {
        return StockChart::class;
    }

    /**
     * @return \App\Support\Livewire\ChartComponentData
     */
    protected function chartData(): ChartComponentData
    {
        $stoks = Stok::all();

        $labels = $stoks->map(function (Stok $stok, $key) {
            return $stok->nama;
        });

        $randomColors = new Collection();
        $randomHoverColors = new Collection();

        for ($i = 0; $i < $stoks->count(); $i++) {
            $hexnum = rand(0x000000, 0xFFFFFF);
            $randomColors->push("#" . dechex($hexnum));
            $randomHoverColors->push("#" . dechex($hexnum - 10));
        }

        $datasets = new Collection([
            'stoks' => $stoks->map(function (Stok $stok, $key) {
                return $stok->stok;
            }),
            'colors' => $randomColors->all(),
            'hover' => $randomHoverColors->all()
        ]);

        return (new ChartComponentData($labels, $datasets));
    }
}
