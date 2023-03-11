<x-livewire-tables::bs4.table.cell>
    {{ $row->no }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->nama }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->kepentingan }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->tipe }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell class="no-print">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <a role="button" class="btn btn-success m-0 p-2" wire:click="$emit('kriteriaModal', '{{ $row->id }}')" wire:loading.attr="disabled">Edit</a>
        {{-- <a role="button" class="btn btn-danger m-0 p-2" wire:click="$emit('deleteKriteriaModal', '{{ $row->id }}')" wire:loading.attr="disabled">Hapus</a> --}}
    </div>
</x-livewire-tables::bs4.table.cell>

