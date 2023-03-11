<?php

namespace App\Http\Livewire;

use App\Models\Expending;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class ExpendingTable extends DataTableComponent
{
    protected $listeners = [
        'expendingTableColumns' => 'columns',
    ];

    public function columns(): array
    {
        return [
            Column::make('No.', 'no')->sortable()->addClass('w-5'),
            Column::make('Pemasok', 'users_name')->sortable(),
            Column::make('Stok', 'stok_nama')->sortable()->addClass('w-12'),
            Column::make('Jumlah', 'jumlah')->sortable()->addClass('w-7'),
            Column::make('Status', 'statuses_nama')->sortable()->addClass('w-14'),
            Column::make('Waktu Permintaan', 'created_at')->sortable()->addClass('w-16'),
            Column::make('Aksi')->addClass('no-print')->addClass('w-15'),
        ];
    }

    public function query(): Builder
    {
        DB::statement(DB::raw('set @row:=0'));
        $expending = Expending::selectRaw("
                expendings.*,
                @row:=@row+1 as no,
                users.name as users_name,
                REPLACE(JSON_EXTRACT(expendings.stok_data, '$.nama'), '\"', '') as stok_nama,
                expendings.jumlah as jumlah,
                statuses.nama as statuses_nama
            ")
            ->join('users', 'expendings.user_id', '=', 'users.id')
            ->join('statuses', 'expendings.status_id', '=', 'statuses.id')
            ->orderBy('expendings.updated_at', 'desc')
            ->when(
                $this->getFilter('search'),
                fn ($query, $term) =>
                $query
                    ->where('invoice', 'like', "%" . trim($term) . "%")
                    ->orWhere('users.name', 'like', "%" . trim($term) . "%")
                    ->orWhere('statuses.nama', 'like', "%" . trim($term) . "%")
                    ->orWhereRaw("REPLACE(JSON_EXTRACT(expendings.stok_data, '$.nama'), '\"', '') like '%" . trim($term) . "%'")
                    ->orWhereRaw("expendings.jumlah like '%" . trim($term) . "%'")
            );

        if (Auth::user()->hasRole('admin')) {
            return $expending;
        } else {
            return $expending->where('user_id', Auth::id());
        }
    }

    public function rowView(): string
    {
        return 'livewire.expending-table';
    }
}
