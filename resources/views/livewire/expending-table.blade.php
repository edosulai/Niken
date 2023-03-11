<x-livewire-tables::bs4.table.cell>
    {{ $row->no }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->users_name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->stok_nama }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->jumlah }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <span class="badge badge-pill badge-warning">{{ $row->statuses_nama }}</span>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ Illuminate\Support\Carbon::parse($row->created_at)->format('d/m/Y - H:m:s') }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell class="no-print">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <a role="button" class="btn btn-secondary m-0 p-2" wire:click="$emit('expendingDetail', '{{ $row->id }}')" wire:loading.attr="disabled">Detail</a>
        @if (Auth::user()->hasRole('admin') && $row->statuses_nama == 'Pending')
            <a role="button" class="btn btn-success m-0 p-2" wire:click="$emit('expendingModal', '{{ $row->id }}')" wire:loading.attr="disabled">Edit</a>
            <a role="button" class="btn btn-danger m-0 p-2" wire:click="$emit('deleteExpendingModal', '{{ $row->id }}')" wire:loading.attr="disabled">Hapus</a>
        @endif
    </div>
</x-livewire-tables::bs4.table.cell>
