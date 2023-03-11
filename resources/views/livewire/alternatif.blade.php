<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row align-items-center px-3">
            <h6 class="m-0 font-weight-bold text-primary mr-auto">Data {{ $title }}</h6>
            <x-jet-button wire:click="openAlternatifModal" wire:loading.attr="disabled">
                Tambah Data
            </x-jet-button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @livewire('alternatif-table')
        </div>
    </div>

    <x-jet-dialog-modal wire:model="alternatifModal" :maxWidth="'sm'">
        <x-slot name="title">
            {{ __($buttonAlternatifModal . ' Data Alternatif') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <x-jet-label class="small" for="form.stok" value="{{ __('Nama Alternatif ') }}" />
                <select id="form.stok" class="form-control form-control-user {{ $errors->has('form.stok') ? 'is-invalid' : '' }}" wire:model.defer="form.stok" autocomplete="form.stok">
                    @foreach ($stoks as $stok)
                        <option value="{{ $stok->id }}" wire:key="{{ $stok->id }}" {!! array_key_exists('stok_id', $form) ? ($form['stok'] == $stok->id ? 'selected' : '') : '' !!}>{{ $stok->nama }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="form.stok" />
            </div>

            @foreach ($k_value as $k)
                <div class="mb-3">
                    <x-jet-label class="small" for="form.{{ $k['k_nama'] }}" value="{{ __('Kriteria ') . $k['k_nama'] }}" />
                    <select id="form.{{ $k['k_nama'] }}" class="form-control form-control-user {{ $errors->has('form.' . $k['k_nama']) ? 'is-invalid' : '' }}" wire:model.defer="form.{{ $k['k_nama'] }}" autocomplete="form.{{ $k['k_nama'] }}">
                        @foreach ($k['k_nilai'] as $key => $k_nilai)
                            <option value="{{ $k_nilai['id'] }}" wire:key="{{ $k_nilai['id'] }}" {!! array_key_exists($k['k_nama'], $form) ? ($form[$k['k_nama']] == $k_nilai['id'] ? 'selected' : '') : '' !!}>{{ $k_nilai['nama'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="form.{{ $k['k_nama'] }}" />
                </div>
            @endforeach

        </x-slot>

        <x-slot name="footer">
            <div class="d-flex d-md-flex">
                <x-jet-secondary-button class="mr-2" wire:click="$toggle('alternatifModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="d-flex align-items-center" wire:click="{{ $aksiAlternatifModal }}" wire:loading.attr="disabled">
                    <span wire:loading wire:target="{{ $aksiAlternatifModal }}" class="spinner-border spinner-border-sm mr-2" role="alternatif"></span>
                    {{ __($buttonAlternatifModal) }}
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="deleteAlternatifModal">
        <x-slot name="title">
            {{ __('Hapus Data Alternatif ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }}</i>
        </x-slot>

        <x-slot name="content">
            {{ __('Apakah Anda yakin ingin menghapus data alternatif ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }} ?</i>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteAlternatifModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="d-flex align-items-center" wire:loading.attr="disabled" wire:click="deleteAlternatif">
                <span wire:loading wire:target="deleteAlternatif" class="spinner-border spinner-border-sm mr-2" role="alternatif"></span>
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
