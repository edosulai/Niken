<?php

namespace App\Http\Livewire;

use App\Models\Alternatif;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AlternatifTable extends DataTableComponent
{
    protected $listeners = [
        'alternatifTableColumns' => 'columns',
    ];

    public function columns(): array
    {
        return [
            Column::make('No.', 'no')->sortable()->addClass('w-7'),
            Column::make('Alternatif', 'stoks_nama')->sortable()->searchable(),
            Column::make('Kriteria Harga')->sortable()->searchable(),
            Column::make('Kriteria Ukuran')->sortable()->searchable(),
            Column::make('Kriteria Berat')->sortable()->searchable(),
            Column::make('Kriteria Aroma')->sortable()->searchable(),
            Column::make('Kriteria Bentuk')->sortable()->searchable(),
            Column::make('Kriteria Rasa')->sortable()->searchable(),
            Column::make('Aksi')->addClass('w-11'),
        ];
    }

    public function query(): Builder
    {
        DB::statement(DB::raw('set @row:=0'));
        return Alternatif::selectRaw("
            alternatifs.id,
            stoks.nama as stoks_nama,
            JSON_EXTRACT(alternatifs.k_value, '$') as k_value,
            @row:=@row+1 as no
        ")
            ->join('stoks', 'alternatifs.stok_id', '=', 'stoks.id')
            ->when(
                $this->getFilter('search'),
                fn ($query, $term) =>
                $query
                    ->where('stoks.nama', 'like', "%" . trim($term) . "%")
                    ->orWhereRaw("JSON_EXTRACT(alternatifs.k_value, '$') like '%" . trim($term) . "%'")
            );
    }

    public function rowView(): string
    {
        return 'livewire.alternatif-table';
    }
}
