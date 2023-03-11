<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row align-items-center px-3">
            <h6 class="m-0 font-weight-bold text-primary mr-auto">Data {{ $title }}</h6>
            {{-- <x-jet-button wire:click="openKriteriaModal" wire:loading.attr="disabled">
                Tambah Data
            </x-jet-button> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @livewire('kriteria-table')
        </div>
    </div>

    <x-jet-dialog-modal wire:model="kriteriaModal" :maxWidth="'sm'">
        <x-slot name="title">
            {{ __($buttonKriteriaModal . ' Data Kriteria') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <x-jet-label class="small" for="form.nama" value="{{ __('Nama Kriteria') }}" />
                <x-jet-input id="form.nama" type="text" class="{{ $errors->has('form.nama') ? 'is-invalid' : '' }}" wire:model="form.nama" autocomplete="form.nama" disabled />
                <x-jet-input-error for="form.nama" />
            </div>

            <div class="mb-3">
                <x-jet-label class="small" for="form.kepentingan" value="{{ __('Level Kepentingan') }}" />
                <x-jet-input id="form.kepentingan" type="number" class="{{ $errors->has('form.kepentingan') ? 'is-invalid' : '' }}" wire:model="form.kepentingan" autocomplete="form.kepentingan" />
                <x-jet-input-error for="form.kepentingan" />
            </div>

            <div class="mb-3">
                <x-jet-label class="small" for="form.tipe" value="{{ __('Tipe Kriteria') }}" />
                <select id="form.tipe" class="form-control form-control-user {{ $errors->has('form.tipe') ? 'is-invalid' : '' }}" wire:model.defer="form.tipe" autocomplete="form.tipe">
                    <option {!! array_key_exists('tipe', $form) ? 'disabled' : 'selected' !!}>--Please choose an option--</option>
                    @foreach ($tipes as $tipe)
                        <option value="{{ $tipe['id'] }}" wire:key="{{ $tipe['id'] }}" {!! array_key_exists('tipe', $form) ? ($form['tipe'] == $tipe['id'] ? 'selected' : '') : '' !!}>{{ $tipe['nama'] }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="form.tipe" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="d-flex d-md-flex">
                <x-jet-secondary-button class="mr-2" wire:click="$toggle('kriteriaModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="d-flex align-items-center" wire:click="{{ $aksiKriteriaModal }}" wire:loading.attr="disabled">
                    <span wire:loading wire:target="{{ $aksiKriteriaModal }}" class="spinner-border spinner-border-sm mr-2" role="kriteria"></span>
                    {{ __($buttonKriteriaModal) }}
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="deleteKriteriaModal">
        <x-slot name="title">
            {{ __('Hapus Data Kriteria ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }}</i>
        </x-slot>

        <x-slot name="content">
            {{ __('Apakah Anda yakin ingin menghapus data kriteria ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }} ?</i>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteKriteriaModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="d-flex align-items-center" wire:loading.attr="disabled" wire:click="deleteKriteria">
                <span wire:loading wire:target="deleteKriteria" class="spinner-border spinner-border-sm mr-2" role="kriteria"></span>
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
