<?php

namespace App\Http\Livewire;

use App\Charts\EarningChart;
use App\Models\Inclusion;
use App\Models\Expending;
use App\Support\Livewire\ChartComponent;
use App\Support\Livewire\ChartComponentData;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Earning extends ChartComponent
{
    /**
     * @return string
     */
    protected function view(): string
    {
        return 'livewire.earning';
    }

    /**
     * @return string
     */
    protected function chartClass(): string
    {
        return EarningChart::class;
    }

    /**
     * @return \App\Support\Livewire\ChartComponentData
     */
    protected function chartData(): ChartComponentData
    {
        DB::statement(DB::raw("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))"));
        $outcomes = Expending::selectRaw("JSON_EXTRACT(expendings.stok_data, '$.hrg_jual') * expendings.jumlah as outcome_price, expendings.created_at as created_at")
            ->join('statuses', 'expendings.status_id', '=', 'statuses.id')
            ->where(
                fn ($query) =>
                $query->where('statuses.nama', '=', 'Accepted')
            )
            ->whereYear('expendings.created_at', '=', Carbon::now()->year)
            ->whereMonth('expendings.created_at', '=', Carbon::now()->month)
            ->orderBy('expendings.created_at', 'asc')
            ->get();

        $incomes = Inclusion::selectRaw("JSON_EXTRACT(stok_data, '$.hrg_jual') * jumlah as income_price, created_at")
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->oldest()
            ->get();

        $datePeriods = collect(CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth())->toArray())->map(function ($each) {
            return $each->format('M d');
        });

        $iteIn = 0;
        $iteOut = 0;
        $newIn = [];
        $newOut = [];
        foreach ($datePeriods as $key => $datePeriod) {
            if ($datePeriod == ($iteOut != $outcomes->count() ? $outcomes[$iteOut]->created_at->format('M d') : false)) {
                $newOut[$key] = [
                    "outcome_price" => $outcomes[$iteOut]->outcome_price,
                    "created_at" => $outcomes[$iteOut]->created_at
                ];
                $iteOut++;
            } else {
                $newOut[$key] = [
                    "outcome_price" => 0,
                    "created_at" => Carbon::parse($datePeriod)
                ];
            }

            if ($datePeriod == ($iteIn != $incomes->count() ? $incomes[$iteIn]->created_at->format('M d') : false)) {
                $newIn[$key] = [
                    "income_price" => $incomes[$iteIn]->income_price,
                    "created_at" => $incomes[$iteIn]->created_at
                ];
                $iteIn++;
            } else {
                $newIn[$key] = [
                    "income_price" => 0,
                    "created_at" => Carbon::parse($datePeriod)
                ];
            }
        }

        $incomes = collect($newIn)->recursive();
        $outcomes = collect($newOut)->recursive();

        $labels = $incomes->map(function ($income, $key) {
            return $income->created_at->format('M d');
        });

        $datasets = new Collection([
            'incomes' => $incomes->map(function ($income, $key) {
                return intval($income->income_price);
            }),
            'outcomes' => $outcomes->map(function ($inclusion, $key) {
                return intval($inclusion->outcome_price);
            })
        ]);

        return (new ChartComponentData($labels, $datasets));
    }
}
