<?php

namespace App\Http\Livewire;

use App\Models\Kriteria;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class KriteriaTable extends DataTableComponent
{
    protected $listeners = [
        'kriteriaTableColumns' => 'columns',
    ];

    public function columns(): array
    {
        return [
            Column::make('No.', 'no')->sortable()->addClass('w-7'),
            Column::make('Nama Kriteria', 'nama')->sortable()->searchable(),
            Column::make('Kepentingan', 'kepentingan')->sortable()->searchable(),
            Column::make('Tipe', 'tipe')->sortable()->searchable(),
            Column::make('Aksi')->addClass('w-11'),
        ];
    }

    public function query(): Builder
    {
        DB::statement(DB::raw('set @row:=0'));
        return Kriteria::selectRaw("id, nama, kepentingan, tipe, @row:=@row+1 as no");
    }

    public function rowView(): string
    {
        return 'livewire.kriteria-table';
    }
}
