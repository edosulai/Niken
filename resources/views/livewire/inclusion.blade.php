<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row align-items-center px-3">
            <h6 class="m-0 font-weight-bold text-primary mr-auto">Data {{ $title }}</h6>
            <x-jet-button wire:click="openInclusionModal" wire:loading.attr="disabled">
                Tambah Data
            </x-jet-button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @livewire('inclusion-table')
        </div>
    </div>

    <x-jet-dialog-modal wire:model="inclusionModal" :maxWidth="'sm'">
        <x-slot name="title">
            {{ __($buttonInclusionModal . ' Data Pemasok') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <x-jet-label class="small" for="form.stok_id" value="{{ __('Jenis Barang') }}" />
                <select id="form.stok_id" class="form-control form-control-user {{ $errors->has('form.stok_id') ? 'is-invalid' : '' }}" wire:model.defer="form.stok_id" autocomplete="form.stok_id">
                    <option {!! array_key_exists('stok_id', $form) ? 'disabled' : 'selected' !!}>--Please choose an option--</option>
                    @foreach ($stoks as $stok)
                        <option value="{{ $stok->id }}" wire:key="{{ $stok->id }}" {!! array_key_exists('stok_id', $form) ? ($form['stok_id'] == $stok->id ? 'selected' : '') : '' !!}>{{ $stok->nama }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="form.stok_id" />
            </div>

            <div class="mb-3">
                <x-jet-label class="small" for="form.jumlah" value="{{ __('Jumlah Pasokan') }}" />
                <x-jet-input id="form.jumlah" type="number" class="{{ $errors->has('form.jumlah') ? 'is-invalid' : '' }}" wire:model="form.jumlah" autocomplete="form.jumlah" />
                <x-jet-input-error for="form.jumlah" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="d-flex d-md-flex">
                <x-jet-secondary-button class="mr-2" wire:click="$toggle('inclusionModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="d-flex align-items-center" wire:click="{{ $aksiInclusionModal }}" wire:loading.attr="disabled">
                    <span wire:loading wire:target="{{ $aksiInclusionModal }}" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                    {{ __($buttonInclusionModal) }}
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="deleteInclusionModal">
        <x-slot name="title">
            {{ __('Hapus Data Stok Keluar ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }}</i>
        </x-slot>

        <x-slot name="content">
            {{ __('Apakah Anda yakin ingin menghapus data stok keluar ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }} ?</i>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteInclusionModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="d-flex align-items-center" wire:loading.attr="disabled" wire:click="deleteInclusion">
                <span wire:loading wire:target="deleteInclusion" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
