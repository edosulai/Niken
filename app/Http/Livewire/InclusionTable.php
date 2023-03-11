<?php

namespace App\Http\Livewire;

use App\Models\Inclusion;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class InclusionTable extends DataTableComponent
{
    protected $listeners = [
        'inclusionTableColumns' => 'columns',
    ];

    public function columns(): array
    {
        return [
            Column::make('No.', 'no')->sortable()->addClass('w-7'),
            Column::make('Stok', "stok_nama")->sortable()->addClass('w-15'),
            Column::make('Jumlah', 'jumlah')->sortable()->addClass('w-10'),
            Column::make('Harga Satuan', "hrg_jual")->sortable()->addClass('w-15'),
            Column::make('Pemasukan', 'income_price')->sortable()->addClass('w-15'),
            Column::make('Waktu', 'created_at')->sortable()->addClass('w-16'),
            Column::make('Aksi')->addClass('no-print')->addClass('w-12'),
        ];
    }

    public function query(): Builder
    {
        DB::statement(DB::raw('set @row:=0'));
        return Inclusion::selectRaw("
                *,
                @row:=@row+1 as no,
                JSON_EXTRACT(stok_data, '$.hrg_jual') as hrg_jual,
                JSON_EXTRACT(stok_data, '$.hrg_jual') * inclusions.jumlah as income_price,
                JSON_UNQUOTE(JSON_EXTRACT(stok_data, '$.nama')) as stok_nama
            ")
            ->latest()
            ->when(
                $this->getFilter('search'),
                fn ($query, $term) =>
                $query
                    ->where('jumlah', 'like', "%" . trim($term) . "%")
                    ->orWhereRaw("JSON_EXTRACT(stok_data, '$.hrg_jual') like '%" . trim($term) . "%'")
                    ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(stok_data, '$.nama')) like '%" . trim($term) . "%'")
                    ->orWhereRaw("JSON_EXTRACT(stok_data, '$.hrg_jual') * inclusions.jumlah like '%" . trim($term) . "%'")
            );
    }

    public function rowView(): string
    {
        return 'livewire.inclusion-table';
    }
}
